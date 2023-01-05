<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;

class AdminContentManagementController extends Controller
{
    public function index()
    {

        return view('admin.content-management');
    }

}
