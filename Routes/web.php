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

Route::group(['prefix' => 'location', 'middleware' => 'auth.web_public'], function () {
    Route::get('/provinces', 'WEB\ProvinceController@Index');
    Route::get('/province', 'WEB\ProvinceController@Index');

    Route::get('/cities', 'WEB\CityController@Index');
    Route::get('/city', 'WEB\CityController@Index');
});
