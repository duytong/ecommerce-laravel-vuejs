<?php

namespace App\Repositories;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Repositories\Repository;

class RoleRepository extends Repository
{
    public function model()
    {
    	return 'App\Role';
    }

    public function store($attributes)
    {
        $role = new Role;

        $role->name = str_slug($attributes->name);
        $role->display_name = ucfirst($attributes->display_name);
        $role->description = ucfirst($attributes->description);

        $role->save();

        if ($attributes->permissions) {
            $role->syncPermissions($attributes->permissions);
        }
    }

    public function showJson($id)
    {
    	$role = Role::where('id', $id)->with('permissions')->first();

        $permissions = [
            'id' => $role->permissions->pluck('id'),
            'display_name' => $role->permissions->pluck('display_name'),
            'description' => $role->permissions->pluck('description')
        ];

    	return response()->json([
    		'role' => $role,
    		'created_at' => $role->created_at->diffForHumans(),
    		'updated_at' => $role->updated_at->diffForHumans(),
            'permissions' => $permissions
    	]);
    }

    public function update($attributes, $id)
    {
        $role = Role::findOrFail($id);

        $role->name = str_slug($attributes->name);
        $role->display_name = ucfirst($attributes->display_name);
        $role->description = ucfirst($attributes->description);

        $role->save();

        if ($attributes->permissions) {
            $role->syncPermissions($attributes->permissions);
        } else {
            $role->detachPermissions();
        }
    }
}
