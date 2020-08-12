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

Route::group([
    'prefix' => 'company', 'middleware' => 'checkCountry'
], function () {
    Route::get('get-by-country', 'CompanyController@getByCountry');
    Route::get('get-by-country-short', 'CompanyController@getByCountryShort');
});

Route::group([
    'prefix' => 'user'
], function () {
    Route::get('get-by-country', 'UserController@getByCountry');
});
