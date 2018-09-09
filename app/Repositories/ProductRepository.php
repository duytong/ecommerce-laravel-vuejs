<?php

namespace App\Repositories;

use App\Product;
use App\Repositories\Repository;

class ProductRepository extends Repository
{
    public function model()
    {
    	return 'App\Product';
    }
}
