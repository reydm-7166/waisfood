<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;



class SavedController extends Controller
{
    

    public function index()
    {

        
        return view('livewire.pages.saved-items-page.saved-items');
    }
}
