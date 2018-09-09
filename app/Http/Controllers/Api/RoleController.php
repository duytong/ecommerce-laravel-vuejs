<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    protected $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }
    
    public function index(RoleRequest $request)
    {
        return $this->role->paginate($request);
    }

    public function store(RoleRequest $request)
    {
        $this->role->store($request);
    }

    public function show($id)
    {
        return $this->role->showJson($id);
    }

    public function update(RoleRequest $request, $id)
    {
        $this->role->update($request, $id);
    }

    public function destroy($ids)
    {
        $this->role->destroy($ids);
    }
}
