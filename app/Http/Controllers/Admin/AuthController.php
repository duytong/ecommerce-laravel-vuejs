<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
    	return view('admin.login');
    }

    public function authenticate(Request $request)
    {
    	// 
    }
}