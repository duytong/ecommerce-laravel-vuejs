<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function model()
    {
    	return 'App\Product';
    }
}
