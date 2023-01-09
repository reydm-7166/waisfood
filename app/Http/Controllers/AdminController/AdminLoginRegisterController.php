<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class AdminLoginRegisterController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    /**
     * Store a new blog post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register_store(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'first_name' => 'required|alpha|max:45',
            'last_name' => 'required|alpha|max:45',
            'password' => 'required|min:8|same:password_confirmation',
            'password_confirmation' => 'required|min:8'
        ]);

        User::create([
            'unique_id' => Str::uuid()->toString(),
            'first_name' => ucfirst($request->first_name),
            'last_name' => ucfirst($request->last_name),
            'age' => 18,
            'email_address' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => "dasdsa",
            'role_as' => 2,
        ]);

        return redirect()->route('admin.login')->with('success', "Account Created Successfully!");
    }

    public function submit(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $email = User::where('email_address', '=', $request->email);
        $if_exist = $email->exists();
        //check if email exists. if not return an error --end--
        if(!$if_exist)
        {
            return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['email' => 'Admin Credentials Not Found!',]);
        }

        $email = User::where('email_address', '=', $request->email)->pluck('id');

        if(Auth::attempt(['id' => $email[0], 'email_address' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = json_decode(Auth::user()->ToJson(), true);
            if($user['role_as'] == 1)
            {
                Session::put('user_data', $user);
                Session::save();

                return redirect()->route('admin.dashboard')->with('success', "Logged in Successfully!");
            }
            return redirect()->back()->with('error', 'Contact Admin');
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
