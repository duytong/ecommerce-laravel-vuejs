<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name',
    	'description',
    	'image',
    	'specifications',
    	'configuration',
    	'original_price',
    	'promotion_price',
    	'quantity',
    	'quantity_sold',
        'rating',
    	'view',
        'user_id',
        'brand_id'
    ];

    protected $cats = [
        'specifications' => 'array',
        'configuration' => 'array'
    ];

    protected $dates = ['deleted_at'];

    public function categoryProduct()
    {
    	return $this->belongsTo(Category::class);
    }

    public function brandProduct()
    {
    	return $this->belongsTo(Brand::Class);
    }

    public function productReviews()
    {
        return $this->hasMany(Review::class);
    }

    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'attribute_product');
    }
}
