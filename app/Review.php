<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

    $fillable = [
    	'rate',
    	'content',
    	'user_id',
    	'product_id'
    ];

    $dates = ['deleted_at'];

    public function userReview()
    {
    	return $this->belongsTo(User::class);
    }

    public function productReview()
    {
    	return $this->belongsTo(Product::class);
    }
}
