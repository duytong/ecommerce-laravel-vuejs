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

Route::group(['prefix' => 'admin'], function () {
    Route::get('{table}/search', 'API\SearchController@search');

    Route::apiResources([
        'permissions' => 'API\PermissionController',
        'roles' => 'API\RoleController',
        'users' => 'API\UserController',
        'categories' => 'API\CategoryController',
    ]);

    Route::post('add-product', 'testcontroller@addProduct');
	Route::post('add-attribute', 'testcontroller@addAttribute');
	Route::post('add-attribute-value', 'testcontroller@addAttributeValue');
	Route::get('product/{id}', 'testcontroller@getProduct');
});
