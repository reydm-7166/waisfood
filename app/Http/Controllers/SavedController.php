<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SavedController extends Controller
{
    public function index()
    {
        return view('user.saved');
    }
}
