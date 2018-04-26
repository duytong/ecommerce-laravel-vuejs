<?php

use Goutte\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('client.welcome');
})->name('welcome');

Route::get('test', function () {
	$client = new Client();
	$crawler = $client->request('GET', 'https://www.stadiumgoods.com/ajax/product/showmore/?category_id=204&page=0&columncount=3');
	$products = json_decode($crawler->text())->products;

	echo '<pre>';
	print_r($products);
	echo '</pre>';

	// foreach ($products as $product) {
	// 	$crawler = $client->request('GET', $product->url);
	// 	$category = $crawler->filter('.breadcrumbs span')->each(function ($node) {
	// 		return $node->text();
	// 	});

	// 	echo '<pre>';
	// 	print_r($category);
	// 	echo '</pre>';
	// }
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('server.layouts.app');
    });
});
