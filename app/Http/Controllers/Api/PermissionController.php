<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Repositories\PermissionRepository;

class PermissionController extends Controller
{
    public $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        return $this->permission->all();
    }
    
    public function paginate($perPage)
    {
        return $this->permission->paginate($perPage);
    }

    public function store(PermissionRequest $request)
    {
        $this->permission->store($request);
    }

    public function show($id)
    {
        return $this->permission->showJson($id);
    }

    public function update(PermissionRequest $request, $id)
    {
        $this->permission->update($request, $id);
    }

    public function destroy($ids)
    {
        $this->permission->destroy($ids);
    }
}
