<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class BrandRepository extends BaseRepository
{
    public function model()
    {
    	return 'App\Brand';
    }
}
