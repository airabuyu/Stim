<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('register');
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

        $validatedData = $request->validate([
            'username' => 'required|unique:users,username|min:6',
            'fullname' => 'required',
            'password' => 'required|min:6|alpha_num',
            'role' => 'required',
        ],
        [
            'username.required' => "Username must be filled",
            'username.unique' => "Username has been taken",
            'username.min' => "Username length must be at least 6 characters",
            'fullname.required' => "Fullname must be filled",
            'password.required' => "Password must be filled",
            'password.min' => "Password length must be at least 6 characters",
            'password.aplha_num' => "Password must contains alpha numeric",
        ]
        );

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => $validatedData['password'],
            'role' =>  $request->role,
            'level' => 0,
            'profile_picture' => "pp.jpg",
        ]);



        $credentials =['username'=>$request->username, 'password'=>$request->password];

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            $request->session()->flash('success', 'Registration Success!');

            return redirect()->intended('/home')->with('alert-success', 'You have registerd.');
        }
        $errors = new MessageBag(['password' => ['Invalid user credentials.']]);
        return back()->withErrors($errors);

        return redirect('register');
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
