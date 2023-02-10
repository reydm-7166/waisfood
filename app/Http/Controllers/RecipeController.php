<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Feedback;
use App\Models\Ingredient;
use App\Models\Direction;
use App\Models\User;
use App\Models\Taggable;
use App\Models\RecipeImage;
use DB;
use Dompdf\Dompdf;
use Illuminate\Support\Str;

class RecipeController extends Controller
{
    public function show($recipe_name, $id)
    {
        $find = Recipe::where('id', $id)->where('recipe_name', $recipe_name)->withoutTrashed()->exists();
        if(!$find)
        {
            abort(404);
        }

        $result = Recipe::join('ingredients', 'recipes.id', 'ingredients.recipe_id')
                      ->where('ingredients.recipe_id', $id)
                      ->withoutTrashed()
                      ->get(['recipes.*', 'ingredients.*']);

        $reviews = DB::table('feedbacks')
                    ->join('recipes', 'feedbacks.recipe_id', 'recipes.id')
                    ->join('users', 'feedbacks.user_id', 'users.id')
                    ->where('recipes.id', $id)
                    ->get(['feedbacks.id AS feedback_id','feedbacks.*', 'users.*'])
                    ->toJson();

        $tags = Taggable::where('taggable_id', $id)->where('taggable_type', "recipe")->get();

        $image_file = RecipeImage::where('recipe_id', $id)->get(['recipe_image']);


        $directions = Direction::where('recipe_id', $id)->get();

        if(empty($result[0]))
        {
            $result = Recipe::where('id', $id)->withoutTrashed()->get();
        }
        // dd($result);

        return view('user.recipe', [
            'results' =>  $result,
            'reviews' => json_decode($reviews),
            'tags' => $tags,
            'directions' => $directions,
            'image_file' => $image_file
        ]);
    }

    public function print($id)
    {
        $recipe = Recipe::find($id);
        $pdf = new Dompdf();
        $pdf->loadHtml('<h1>Welcome to Laravel</h1>');
        $pdf->render();

        $converted = Str::snake(strtolower($recipe->recipe_name), '-');

        $pdf->stream($converted . "-details-and-how-to-cook" . ".pdf", array("Attachment" => 1));

        return redirect()->back()->with('download-success', 'Your action was successful!');
    }
}
