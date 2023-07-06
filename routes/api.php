<?php

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

Route::prefix('search')->group(function(){
    Route::get('/provinces', 'Region\Controllers\RegionController@getProvinces');
    Route::get('/cities', 'Region\Controllers\RegionController@getCities');
});

Route::post('/login', 'Auth\Controllers\LoginController@loginWithEmail');
