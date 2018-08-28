<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthenticatedController extends Controller
{
    public function authenticated()
    {
    	if (auth()->check()) {
    		return 'authenticated';
    	} else {
    		return 'Unauthentication';
    	}
    }
}
