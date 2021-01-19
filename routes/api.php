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

Route::group(['namespace' => 'Api', 'as' => 'api.', 'prefix'=>'api'], function (){
    //Dashboard route: administrative.dashboard.index
    Route::group(['prefix'=>'administrative', 'as' => 'administrative.'], function (){
        Route::get('user', 'AdministrativeApiController@get_ajax_user')->name('users');

    });
});