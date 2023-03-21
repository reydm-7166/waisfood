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
    public function redirectToGithub($service)
    {
        return Socialite::driver($service)->stateless()->redirect();
    }

    public function handleGithubCallback($service)
    {

        try {
            $userdata = Socialite::driver($service)->fields([
                'first_name',
                'last_name',
                'picture',
                'email'
                ])->stateless()->user();


            $finduser = User::where('service_id', $userdata->id)->first();


            if($finduser){

                Auth::login($finduser);

                $user = json_decode(Auth::user()->ToJson(), true);

                Session::put('user_data', $user);
                Session::save();

                return redirect()->route('post.index')->with('success', "Logged in Successfully!");;

            }

            $newUser = User::create([
                'unique_id' => Str::uuid()->toString(),
                'first_name' => ucfirst($userdata->user['first_name']),
                'last_name' => ucfirst($userdata->user['last_name']),
                'age' => 18,
                'email_address' => $userdata->email,
                'password' => Hash::make('123456dummy'),
                'service_id' => $userdata->id,
                'profile_picture' => 'default_profile.png',
            ]);

            return redirect()->route('login.index')->with('success', "Account Created Successfully!");

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
