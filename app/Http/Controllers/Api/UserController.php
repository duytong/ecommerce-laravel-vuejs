<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @param  int  $perPage
     * @return \Illuminate\Http\Response
     */
    public function index($perPage)
    {
        return $this->user->paginate($perPage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $this->user->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->user->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        return $this->user->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_numeric($id)) {
            $this->user->delete($id);
        } else {
            $this->user->deleteMultiple($id);
        }
    }
}
