<?php

namespace App\Http\Controllers;
use App\Models\Recipe;
use Illuminate\Http\Request;

class AdminContentManagementController extends Controller
{
    public function index()
    {

        return view('admin.content-management');
    }
   
}
