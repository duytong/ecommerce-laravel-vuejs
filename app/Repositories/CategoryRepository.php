<?php

namespace App\Repositories;

use App\Repositories\Repository;

class CategoryRepository extends Repository
{
    public function model()
    {
    	return 'App\Category';
    }
}
