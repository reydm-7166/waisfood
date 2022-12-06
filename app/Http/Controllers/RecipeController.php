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

class RecipeController extends Controller
{
    public function show($recipe_name, $id)
    {
        $result = Recipe::join('ingredients', 'recipes.id', 'ingredients.recipe_id')
                      ->where('ingredients.recipe_id', $id)
                      ->get(['recipes.*', 'ingredients.*']);

        $reviews = DB::table('feedbacks')
                    ->join('recipes', 'feedbacks.recipe_id', 'recipes.id')
                    ->join('users', 'feedbacks.user_id', 'users.id')
                    ->where('recipes.id', $id)
                    ->get(['feedbacks.id AS feedback_id','feedbacks.*', 'users.*'])
                    ->toJson();
                    
        $tags = Taggable::where('taggable_id', $id)->where('taggable_type', "recipe")->get();

        $image_file = RecipeImage::where('recipe_id', $id)->value('recipe_image')->get();
        

        $directions = Direction::where('recipe_id', $id)->get();

        if(empty($result[0]))
        {
            $result = Recipe::where('id', $id)->get();
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
}
