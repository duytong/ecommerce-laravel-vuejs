<?php

namespace App\Repositories;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Repositories\BaseRepository;

class PermissionRepository extends BaseRepository
{
    public function model()
    {
    	return 'App\Permission';
    }

    public function store($attributes)
    {
        if ($attributes->permissionType === 'basic') {
            $permission = new Permission;

            $permission->name = str_slug($attributes->name);
            $permission->display_name = ucfirst($attributes->display_name);
            $permission->description = ucfirst($attributes->description);

            $permission->save();
        } else {
            $actions = $attributes->crud_selected;
            $resource = $attributes->resource;
            $permissions = [];
            $timestamp = Carbon::now();

            foreach ($actions as $action) {
                $name = str_slug($action . '-' . $resource);
                $display_name = $action . ' ' . $resource;
                $description = 'Allow a user to ' . strtolower($action) . ' ' . $resource;

                $request = new Request([
                    'name' => $name
                ]);

                $request->validate([
                    'name' => 'unique:permissions'
                ]);

                $permissions[] = [
                    'name' => $name,
                    'display_name' => $display_name,
                    'description' => $description,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                ];
            }

            Permission::insert($permissions);
        }
    }

    public function update($attributes, $id)
    {
        $permission = Permission::findOrFail($id);

        $permission->name = str_slug($attributes->name);
        $permission->display_name = ucfirst($attributes->display_name);
        $permission->description = ucfirst($attributes->description);

        $permission->save();
    }
}
