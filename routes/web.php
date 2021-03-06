<?php

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
    return view('welcome');
});

// Authentication Routes...
Route::get('login',  'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
// Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('signup',  'Auth\SignupController@showSignupForm');
Route::post('signup', 'Auth\SignupController@signup');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['prefix' => 'admin'], function() {
	Route::get('/', function () {
	    return view('admin.app');
	});
});
