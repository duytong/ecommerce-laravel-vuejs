<?php

namespace App\Repositories;

use App\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    /**
     * Specify model class name.
     *
     * @return string
     */
    public function model()
    {
    	return User::class;
    }

    /**
     * Create a new user.
     * 
     * @param  array  $attributes
     * @return void
     */
    public function create($attributes)
    {
        $user = new User;

        $user->name = $attributes['name'];
        $user->email = $attributes['email'];
        $user->password = bcrypt($attributes['password']);
        $user->verify_token = str_random(25);

        if (array_key_exists('avatar', $attributes)) {
            $user->avatar = $attributes['avatar'];
        }

        $user->save();

        if (array_key_exists('roles_id', $attributes)) {
            $user->syncRoles($attributes['roles_id']);
        }
    }

    /**
     * Find a user by its primary key.
     * 
     * @param  int  $id
     * @return json
     */
    public function find($id)
    {
    	$user = User::where('id', $id)->with('roles')->first();
        $roles = $user->roles->pluck('id');

    	return response()->json([
    		'user' => $user,
            'roles' => $roles,
    		'created_at' => $user->created_at->diffForHumans(),
    		'updated_at' => $user->updated_at->diffForHumans()
    	]);
    }

    /**
     * Find a user by its primary key and update it.
     * 
     * @param  array  $attributes
     * @param  int  $id
     * @return void
     */
    public function update($attributes, $id)
    {
        $user = User::find($id);

        $user->name = $attributes['name'];
        $user->email = $attributes['email'];

        if (array_key_exists('password', $attributes)) {
            $user->password = bcrypt($attributes['password']);
        }

        $user->save();

        if (array_key_exists('roles_id', $attributes)) {
            $user->syncRoles($attributes['roles_id']);
        } else {
            $user->detachRoles();
        }
    }
}
