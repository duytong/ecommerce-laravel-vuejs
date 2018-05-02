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


// Authentication
Route::post('signup', 'SignupController@signup')->name('signup');
Route::post('login', 'LoginController@login')->name('login');
Route::get('logout', 'LogoutController@logout')->name('logout');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('server.layouts.app');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
