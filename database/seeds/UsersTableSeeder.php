<?php

use App\User;
use Faker\Factory as Faker;
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
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i ++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('sercet'),
                'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'gender' => $faker->randomElement(['male', 'female']),
                'phone' => $faker->tollFreePhoneNumber,
                'address' => $faker->streetAddress,
                'verify_token' => str_random(32)
            ]);
        }
    }
}
