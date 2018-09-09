<?php

namespace App\Repositories;

use App\Repositories\Repository;

class ReviewRepository extends Repository
{
    public function model()
    {
    	return 'App\Review';
    }
}
