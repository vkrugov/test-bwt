<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'country'
], function () {
    Route::get('get-companies', 'CountryController@getCompanies');
    Route::get('get-users', 'CountryController@getUsers');
    Route::get('get-companies-short', 'CountryController@getCompaniesShort');
});
