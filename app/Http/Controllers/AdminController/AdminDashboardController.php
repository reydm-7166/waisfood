<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Charts\MainChart;

class AdminDashboardController extends Controller
{
    public function index()
    {


        $all = Recipe::get();

        $mainChart = new MainChart;

        // return json_encode(json_decode($all), JSON_PRETTY_PRINT);
        return view('admin.dashboard');
    }
}

