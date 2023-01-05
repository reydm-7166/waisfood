<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecipeApprovalController extends Controller
{
    public function index()
    {
        return view('admin.recipe-approval');
    }
}
