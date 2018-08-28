<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository
{
    public function model()
    {
    	return 'App\Order';
    }
}
