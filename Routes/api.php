<?php

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

Route::group([
    'prefix' => 'location/v1',
    'middleware' => ['auth.api_public'],
], function ($api) {

    Route::get('/province', 'API\ProvinceController@Index');
    Route::get('/city', 'API\CityController@Index');

});
