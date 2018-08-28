<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository
{
    public function model()
    {
    	return 'App\Category';
    }
}
