<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        return $this->user = $user;
    }
    
    public function paginate($perPage)
    {
        return $this->user->paginate($perPage);
    }

    public function store(Request $request)
    {
        return $this->user->store($request->all());
    }

    public function show($id)
    {
        return $this->user->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->user->update($request->all(), $id);
    }

    public function destroy($ids)
    {
        return $this->user->destroy($ids);
    }
}
