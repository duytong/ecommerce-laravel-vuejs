<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $dates = ['deleted_at'];

    public function brands()
    {
    	return $this->hasMany(Product::class);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
