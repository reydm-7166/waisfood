<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Feedback;
use App\Models\Ingredient;
use App\Models\Direction;
use App\Models\User;

class RecipeController extends Controller
{
    public function show($recipe_name, $id)
    {
        $result = Dish::join('ingredients', 'dishes.id', 'ingredients.dish_id')
                      ->where('ingredients.dish_id', $id)
                      ->get(['dishes.*', 'ingredients.*']);

        $reviews = Feedback::join('users', 'users.id', 'feedback.user_id')
                            ->where('dish_id', $id)
                            ->get(['feedback.id AS feedback_id', 'users.*', 'feedback.*']);
        // dd($reviews);
        $directions = Direction::where('dish_id', $id)->get();

        if(empty($result[0]))
        {
            $result = Dish::where('id', $id)->get();
        }

        return view('user.recipe', [
            'result' =>  $result,
            'reviews' => json_decode($reviews),
            'directions' => $directions
        ]);
    }
}
