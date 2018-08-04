<?php

namespace App\Http\Controllers;

// use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class SignupController extends Controller
{

	public $user;

    /**
     * Instantiate a new repository instance.
     * 
     * @param  UserRepository  $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Sign up for customer.
     * 
     * @param  UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function signup(Request $request)
    {
        $user = $this->user->create($request->all());
        \Auth::login($user, true);

        return back();
    }
}
