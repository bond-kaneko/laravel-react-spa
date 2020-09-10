<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::group(['middleware' => ['api']], function() {
//     Route::resource('post' , 'api\PostController');
//     Route::post('post/add', 'api\PostController@add');
//     Route::post('post/delete', 'api\PostController@delete');
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');

    Route::get('post', 'api\PostController@index');
    // Route::post('post', 'api\PostController@index');

});

// Route::group(["middleware" => "auth:api"], function () {
//     Route::get("post", "api\PostController@index");
// });