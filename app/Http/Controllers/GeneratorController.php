<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Dish;
use App\Models\Ingredient;
use App\Models\DishImage;


class GeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dish = Dish::paginate(12);
        
        // foreach ($dish->items() as $key => $value) {

        //     $dish[$key]->ingredient_count = Ingredient::where('dish_id', $value->id)->count(); 
        // }
        // dd($dish->toJson());
        
        return view('user.generator');
    }

    // public function paginate($page)
    // {
        

    //     $dish = Dish::paginate(12);
        
    //     foreach ($dish->items() as $key => $value) {

    //         $dish[$key]->ingredient_count = Ingredient::where('dish_id', $value->id)->count(); 
    //     }

    //     return response()->json([
    //         'message' => "Success",
    //         'dish' => $dish,
    //     ]);
    // }
    
}
