<?php

namespace App\Repositories;

use App\Repositories\Repository;

class OrderRepository extends Repository
{
    public function model()
    {
    	return 'App\Order';
    }
}
