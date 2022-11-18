<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class RecipeController extends Controller
{
    public function show($recipe_name, $id)
    {
        $result = Dish::where('dish_name', $recipe_name)
                      ->get()
                      ->toJson();

        return view('user.recipe')->with('result', json_decode($result));
    }
}
