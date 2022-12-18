<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.login');
    }

    public function submit(Request $request){
        $this->validate($request, [
            'email_address' => 'required|email',
            'password' => 'required'
        ]);

        $email = User::where('email_address', '=', $request->email_address)->pluck('id');

        if(!$email){
            return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['email_address' => 'Email is not registered yet!',]);
        }   

        if(Auth::attempt(['id' => $email[0], 'email_address' => $request->email_address, 'password' => $request->password])) {
            $request->session()->regenerate();
            
            $user = json_decode(Auth::user()->ToJson(), true);

            Session::put('user_data', $user);
            Session::save();

            return redirect()->route('post.index');
        }
        return redirect()
                        ->back()
                        ->withInput()
                        ->withErrors(['password' => 'Incorrect password!']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
