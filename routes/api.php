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

Route::resource('taskapi', 'ApiController');
/*    Route::get('taskapi', 'ApiController@index');
	Route::get('taskapi/{id}', 'ApiController@show');
	Route::post('taskapi', 'ApiController@store');
	Route::put('taskapi/{id}', 'ApiController@update');
	Route::delete('taskapi/{id}', 'ApiController@destroy');*/
