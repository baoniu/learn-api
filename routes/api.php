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

//Route::group(['prefix'=>'v1'], function(){
//    Route::get('/user', function (Request $request) {
//        return $request->user();
//    })->middleware('auth:api');
//
//
//    Route::resource('lessons', 'LessonsController');
//});

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Api\Controllers'], function ($api) {
        $api->post('user/login','AuthController@authenticate');
        $api->post('user/register', 'AuthController@register');
        $api->group(['middleware'=>'oauth'], function($api){
            $api->get('me', 'AuthController@getAuthenticatedUser');
            $api->get('lessons', 'LessonsController@index');
            $api->get('lessons/{id}', 'LessonsController@show');
        });
    });
});