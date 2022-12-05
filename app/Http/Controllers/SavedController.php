<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class SavedController extends Controller
{
    public function index()
    {

        // $saved = SavedPost::where('')->get();
        // dd($saved);
        return view('user.saved');
    }
}
