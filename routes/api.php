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

Route::group(['prefix' => 'admin'], function() {
    Route::get('{table}/{perPage}/search', 'API\SearchController@search');

    Route::get('users/paginate/{perPage}', 'API\UserController@paginate');
    Route::resource('users', 'API\UserController')->except([
    	'index', 'create', 'edit'
    ]);

    Route::get('roles/paginate/{perPage}', 'API\RoleController@paginate');
    Route::resource('roles', 'API\RoleController')->except([
    	'index', 'create', 'edit'
    ]);

    Route::get('permissions/paginate/{perPage}', 'API\PermissionController@paginate');
    Route::resource('permissions', 'API\PermissionController')->except([
    	'create', 'edit'
    ]);

    Route::get('categories/paginate/{perPage}', 'API\CategoryController@paginate');
    Route::resource('categories', 'API\CategoryController')->except([
        'index', 'create', 'edit'
    ]);

    Route::get('brands/paginate/{perPage}', 'API\BrandController@paginate');
    Route::resource('brands', 'API\BrandController')->except([
        'index', 'create', 'edit'
    ]);

    Route::get('products/paginate/{perPage}', 'API\ProductController@paginate');
    Route::resource('products', 'API\ProductController')->except([
        'index', 'create', 'edit'
    ]);
});
