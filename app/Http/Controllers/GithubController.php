<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;



class GithubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }
    public function handleGithubCallback()
    {
        
        try {
      
            $userdata = Socialite::driver('github')->stateless()->user();
       
            $finduser = User::where('google_id', $userdata->id)->first();

            if($finduser){
       
                Auth::login($finduser);
                
                $user = json_decode(Auth::user()->ToJson(), true);

                Session::put('user_data', $user);
                Session::save();
      
                return redirect()->route('post.index');
       
            }
            
            $newUser = User::create([
                'unique_id' => Str::uuid()->toString(),
                'first_name' => ucfirst($userdata->name),
                'last_name' => ucfirst('burikat'),
                'age' => 18,
                'email_address' => $userdata->email,
                'password' => Hash::make('123456dummy'),
                'google_id'=> $userdata->id,
                'profile_picture' => 'pphehe',
            ]);

            return redirect()->route('register.create')->with('success', "Account Created Successfully!");

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
