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

        return view('admin.dashboard');
    }
}

