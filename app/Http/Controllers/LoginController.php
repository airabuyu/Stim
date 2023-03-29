<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\MessageBag;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function authenticate(Request $request)
    {
        //
        // dd($request);
        $errors = new MessageBag();

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' => "Username must be filled",
            'password.required' => "Password must be filled",
        ]

        );

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if($request->remember_me){
                Cookie::queue('username',$request->username,120);
                Cookie::queue('password',$request->password,120);
            }

            return redirect()->intended('/home')->with('alert-success', 'You are now logged in.');
        }
        $errors = new MessageBag(['password' => ['Invalid user credentials.']]);
        return back()->withErrors($errors);
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
