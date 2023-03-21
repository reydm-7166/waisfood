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
    public $results;
    public $reviews;
    public $directions;
    public $image_file;

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

        $pdf = new Dompdf();

        $find = Recipe::where('id', $id)->withoutTrashed()->exists();
        if(!$find)
        {
            abort(404);
        }

        $result = Recipe::join('ingredients', 'recipes.id', 'ingredients.recipe_id')
                      ->where('ingredients.recipe_id', $id)
                      ->withoutTrashed()
                      ->get(['recipes.*', 'ingredients.*']);


        $image_file = RecipeImage::where('recipe_id', $id)->get(['recipe_image']);

        $directions = Direction::where('recipe_id', $id)->get();



        $html = view('custom-paginate.pdftemplate', [
            'recipe' => $result,
            'image_file' => $image_file,
            'direction' => $directions,
        ])->render();

        $pdf->loadHtml($html);

        $pdf->render();
        // dd($result);
        // return view('custom-paginate.pdftemplate', [
        //     'recipe' => $result,
        //     'image_file' => $image_file,
        //     'direction' => $directions,
        // ]);
        $converted = Str::snake(strtolower($result[0]->recipe_name), '-');

        $pdf->stream($converted . "-details-and-how-to-cook" . ".pdf", array("Attachment" => 1));

        return redirect()->back()->with('download-success', 'Your action was successful!');
    }
}
