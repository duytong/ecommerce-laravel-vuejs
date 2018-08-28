<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
    	$users = [];
    	$password = bcrypt('sercet');

    	foreach (range(1, 1000) as $index)
    	{
    		$timestamp = Carbon\Carbon::now();

    		$users[] = [
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => $password,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'created_at' => $timestamp,
                'updated_at' => $timestamp
            ];
    	}

    	App\User::insert($users);
    }
}
