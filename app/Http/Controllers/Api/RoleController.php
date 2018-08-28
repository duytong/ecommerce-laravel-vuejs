<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    public $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }
    
    public function paginate($perPage)
    {
        return $this->role->paginate($perPage);
    }

    public function store(Request $request)
    {
        $this->role->store($request);
    }

    public function show($id)
    {
        return $this->role->showJson($id);
    }

    public function update(Request $request, $id)
    {
        $this->role->update($request, $id);
    }

    public function destroy($ids)
    {
        $this->role->destroy($ids);
    }
}
