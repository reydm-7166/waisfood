<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;

class AdminContentManagement extends Controller
{
    public function index()
    {
        $recipe = Recipe::all();

        return view('admin.content-management');
    }
   
}
