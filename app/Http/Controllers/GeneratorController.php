<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\DishImage;

use App\Rules\ArrayAtLeastOneRequired;

use DB;
use Exception;
use Log;
use Session;
use Validator;

class GeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        return view('user.generator');
    }

    protected function ingredientsForm() {
        return view('generator.index');
    }

    protected function ingredientsFormSubmit(Request $req) {
        // Validates the inputs
        $validator = Validator::make($req->all(), [
            'ingredients' => ['array', 'required', new ArrayAtLeastOneRequired()],
            'ingredients.*' => 'nullable|string|max:255'
        ], [
            'ingredients.*.string' => 'Please provide a proper ingredient...',
            'ingredients.*.max' => 'Ingredient must be less than or equal to 255 characters long...'
        ]);

        // Compresses the ingredients
        $ingredients = [];
        foreach ($req->ingredients as $i)
            if ($i)
                array_push($ingredients, $i);

        $req->merge([
            'ingredients' => $ingredients
        ]);

        // If the validation isn't met, return back to the form page with the inputs and the error
        if ($validator->fails()) {
            $hasContent = array_key_exists('ingredients' ,$validator->failed()) ? (substr(array_keys($validator->failed()['ingredients'])[0], strrpos(array_keys($validator->failed()['ingredients'])[0], "\\") + 1) === "ArrayAtLeastOneRequired") : false;

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator)
                ->with("has_content", $hasContent);
        }

        try {
            DB::beginTransaction();

            $recipes = Recipe::leftJoin('ingredients', 'recipes.id', '=', 'ingredients.recipe_id');

            // Similar to an "AND" arguement
            if ($req->useAnd)
                foreach ($req->ingredients as $i)
                    $recipes = $recipes->where('ingredients.ingredient', '=', $i);
            // Similar to an "OR" arguement
            else
                $recipes = $recipes->whereIn('ingredients.ingredient', $req->ingredients);

            $recipes = $recipes->select('recipes.*')
                                ->distinct()
                                ->get();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::error($e);

            return redirect()
                ->back()
                ->with('flash_error', 'Something went wrong, please try again later');
        }

        return redirect()
            ->route('generator.form.show')
            ->with('recipes', $recipes)
            ->with('flash_type', $recipes->count() > 0 ? 'flash_success' : 'flash_info')
            ->with($recipes->count() > 0 ? 'flash_success' : 'flash_info', $recipes->count() > 0 ? "Found {$recipes->count()} recipes that can be made with the provided ingredients" : "No recipes found that can be made from your ingredients");
    }

    protected function ingredientsFormShow() {
        $recipes = Session::get('recipes');

        // dd($recipes);
        return view('generator.show', [
            'recipes' => $recipes
        ])
        ->with(Session::get('flash_type'), Session::get(Session::get('flash_type')));
    }
}