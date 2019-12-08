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

Route::post('login', 'API\ApiAuthController@login');
Route::group(['middleware' => 'auth'], function () {
});
Route::resource('countries', 'API\CountryController');
Route::get('country/get-country', 'API\CountryController@GetAll');
Route::get('/city/{id}/get-by-country',"API\CityController@GetAllByCountry");
Route::resource('cities', 'API\CityController');
Route::resource('billtypes', 'API\BillTypeController');
Route::resource('rentertypes', 'API\RenterTypeController');
Route::get('get-rentertype', 'API\RenterTypeController@getAll');
Route::resource('renters', 'API\RenterController');
Route::resource('thanas', 'API\ThanaController');