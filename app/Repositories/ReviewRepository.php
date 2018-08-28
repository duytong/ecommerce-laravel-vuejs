<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class ReviewRepository extends BaseRepository
{
    public function model()
    {
    	return 'App\Review';
    }
}
