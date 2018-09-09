<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $users;

    /**
     * Create a new controller instance.
     * 
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        return $this->users = $users;
    }
    
    /**
     * Display a listing of the resource.
     * 
     * @param  UserRequest  $request
     * @return Response
     */
    public function index(UserRequest $request)
    {
        return $this->users->index($request->perPage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        return $this->users->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->users->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        return $this->users->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $ids
     * @return Response
     */
    public function destroy($ids)
    {
        return $this->users->destroy($ids);
    }
}
