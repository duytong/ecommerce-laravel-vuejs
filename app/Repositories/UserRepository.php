<?php

namespace App\Repositories;

use App\Repositories\Repository;

class UserRepository extends Repository
{
    public function model()
    {
    	return 'App\User';
    }
}
