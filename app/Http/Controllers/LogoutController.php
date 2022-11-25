<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    //

    public function logout(){
        auth()->logout();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect()->route('login.index')->with('message', 'Logged out successfully!');
    }
}
