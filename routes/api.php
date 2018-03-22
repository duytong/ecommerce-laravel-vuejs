<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('admin/{table}/{perPage}/search', 'Admin\ApiController@search');

Route::group(['prefix' => 'admin'], function () {
	// User.
	Route::resource('users', 'Api\UserController', ['except' => ['index']]);
	Route::get('users/index/{perPage}', 'Api\UserController@index')->name('users.index');

	// Role.
	Route::resource('roles', 'Api\RoleController', ['except' => ['index']]);
	Route::get('roles/index/{perPage}', 'Api\RoleController@index')->name('roles.index');

	// Permission.
	Route::resource('permissions', 'Api\PermissionController', ['except' => ['index']]);
	Route::get('permissions/index/{perPage}', 'Api\PermissionController@index')->name('permissions.index');

	Route::get('{table}/{perPage}/search', 'Api\SearchController@search');
});
