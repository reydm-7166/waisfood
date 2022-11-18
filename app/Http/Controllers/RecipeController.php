<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class RecipeController extends Controller
{
    public function show($recipe)
    {
        $result = Dish::where('dish_name', $recipe)->get()->toJson();

        return view('user.recipe')->with('result', json_decode($result));
    }
}
