<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;

class AdminLoginRegisterController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function submit(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = User::where('email_address', '=', $request->email)->where('role_as', 1)->exists();
        if(!$email)
        {
            return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['email' => 'Admin Credentials Not Found!',]);
        }

        $email = User::where('email_address', '=', $request->email)->where('role_as', 1)->pluck('id');

        if(Auth::attempt(['id' => $email[0], 'email_address' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = json_decode(Auth::user()->ToJson(), true);

            Session::put('user_data', $user);
            Session::save();

            return redirect()->route('admin.dashboard')->with('success', "Logged in Successfully!");
        }
        return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['password' => 'Incorrect password!']);
    }

    public function registration()
    {
        return view('admin.registration');
    }
}
