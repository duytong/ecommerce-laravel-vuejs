<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
    	$credentials = $request->only('email', 'password');

    	if (auth()->attempt($credentials, true)) {
    		return 'Success';
    	} else {
    		return 'These credentials do not match our records.';
    	}
    }
}
