<?php

namespace App;

use Laravel\Scout\Searchable;
use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    use Searchable;
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'description'];
}
