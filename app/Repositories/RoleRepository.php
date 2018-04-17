<?php

namespace App\Repositories;

use App\Role;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository
{
	/**
	 * Specify model class name.
	 * 
	 * @return string
	 */
    public function model()
    {
    	return Role::class;
    }

    /**
     * Create a new role.
     * 
     * @param  object  $attributes
     * @return void
     */
    public function create($attributes)
    {
        $role = new Role;

        $role->name = str_slug($attributes->name);
        $role->display_name = ucwords(strtolower($attributes->display_name));
        $role->description = $attributes->description;

        $role->save();

        if ($attributes->permissions_id) {
            $role->syncPermissions($attributes->permissions_id);
        }
    }

    /**
     * Get a role.
     * 
     * @param  int  $id
     * @return json
     */
    public function get($id)
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

    /**
     * Update a role.
     * 
     * @param  object  $attributes
     * @param  int  $id
     * @return void
     */
    public function update($attributes, $id)
    {
        $role = Role::find($id);

        $role->name = str_slug($attributes->name);
        $role->display_name = ucwords(strtolower($attributes->display_name));
        $role->description = $attributes->description;

        $role->save();

        if ($attributes->permissions_id) {
            $role->syncPermissions($attributes->permissions_id);
        } else {
            $role->detachPermissions();
        }
    }
}
