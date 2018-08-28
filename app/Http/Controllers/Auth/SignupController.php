<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignupController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showSignupForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
    {
        $this->validator();

        $this->createUser($request->all());
    }

    public function validator(Request $request)
    {
        $request->validate([
            'email' => 'unique:users'
        ]);
    }

    public function createUser($requests)
    {
        \App\User::create([
            'name' => $requests['name'],
            'email' => $requests['email'],
            'password' => bcrypt($requests['password'])
        ]);
    }
}
