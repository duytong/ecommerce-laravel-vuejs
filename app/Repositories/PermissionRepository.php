<?php

namespace App\Repositories;

use App\Permission;
use App\Repositories\BaseRepository;

class PermissionRepository extends BaseRepository
{
    /**
	 * Specify model class name.
	 * 
	 * @return string
	 */
    public function model()
    {
    	return Permission::class;
    }

    /**
     * Create a permission.
     * 
     * @param  array  $attributes
     * @return void
     */
    public function create($attributes)
    {
    	if ($attributes->permission_type === 'basic') {
    		$permission = new Permission;

    		$permission->name = str_slug($attributes->name);
    		$permission->display_name = ucwords(strtolower($attributes->display_name));
    		$permission->description = $attributes->description;

    		$permission->save();

    	} else {
    		foreach ($attributes->crud_selected as $value) {
    			$name = strtolower($value) . '-' . $attributes->resource;
    			$display_name = $value . ' ' . ucwords(strtolower($attributes->resource));
    			$description = 'Allows a user to ' . strtoupper($value) . ' a ' . ucwords(strtolower($attributes->resource));

    			$permission = new Permission;

    			$permission->name = $name;
    			$permission->display_name = $display_name;
    			$permission->description = $description;

    			$permission->save();
    		}
    	}
    }

    /**
     * Get a permission.
     * 
     * @param  int  $id
     * @return json
     */
    public function get($id)
    {
    	$permission = Permission::find($id);

    	return response()->json([
    		'permission' => $permission,
    		'created_at' => $permission->created_at->diffForHumans(),
    		'updated_at' => $permission->updated_at->diffForHumans()
    	]);
    }
}
