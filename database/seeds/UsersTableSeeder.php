<?php

use App\User;
use Goutte\Client;
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
        // $faker = Faker::create();

        // for ($i = 0; $i < 100; $i ++) {
        //     User::create([
        //         'name' => $faker->name,
        //         'email' => $faker->unique()->safeEmail,
        //         'password' => bcrypt('sercet'),
        //         'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
        //         'gender' => $faker->randomElement(['male', 'female']),
        //         'phone' => $faker->tollFreePhoneNumber,
        //         'address' => $faker->streetAddress,
        //         'verify_token' => str_random(32)
        //     ]);
        // }
    
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.stadiumgoods.com/ajax/product/showmore/?category_id=204&page=0&columncount=3');
        $products = json_decode($crawler->text())->products;

        $i = 1;

        foreach ($products as $product) {
            $file = file_get_contents($product->image_url);
            $extension = pathinfo($product->image_url, PATHINFO_EXTENSION);
            $fileName = 'product-' . $i++ . '.' . $extension;

            File::put(public_path('client/images/') . $fileName, $file);
        }
    }
}
