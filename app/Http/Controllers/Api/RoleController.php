<?php

namespace App\Http\Controllers\Api;

use App\Repositories\RoleRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Server\RoleRequest;

class RoleController extends Controller
{
    public $role;

    /**
     * Instantiate a new repository instance.
     * 
     * @param  RoleRepository  $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  int|string  $param
     * @return \Illuminate\Http\Response
     */
    public function index($param)
    {
        if (is_numeric($param)) {
            return $this->role->paginate($param);
        }
        
        return $this->role->all($param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->role->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->role->get($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RoleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $this->role->update($request, $id);
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
            $this->role->delete($id);
        } else {
            $this->role->deleteMultiple($id);
        }
    }
}
