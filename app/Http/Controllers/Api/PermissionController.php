<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use App\Http\Requests\Server\PermissionRequest;

class PermissionController extends Controller
{
    public $permission;

    /**
     * Instantiate a new repository instance.
     * 
     * @param  PermissionRepository  $permission
     */
    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
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
            return $this->permission->paginate($param);
        }
        
        return $this->permission->all($param);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $this->permission->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->permission->get($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PermissionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        return $this->permission->update($request->all(), $id);
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
            $this->permission->delete($id);
        } else {
            $this->permission->deleteMultiple($id);
        }
    }
}
