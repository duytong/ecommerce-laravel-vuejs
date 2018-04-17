<?php

namespace App;

use Laravel\Scout\Searchable;
use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    use Searchable;

    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];
}
