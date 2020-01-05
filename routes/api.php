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
Route::resource('cities', 'API\CityController');
Route::resource('billtypes', 'API\BillTypeController');
Route::resource('rentertypes', 'API\RenterTypeController');
Route::resource('renters', 'API\RenterController');
Route::resource('thanas', 'API\ThanaController');
Route::resource('houses', 'API\HouseController');
Route::resource('apartments', 'API\ApartmentController');
Route::resource('shops', 'API\ShopController');
Route::resource('advance_payments', 'API\AdvancePaymentController');
Route::resource('electric_bills', 'API\ElectricityBillController');
Route::resource('active_renters', 'API\ActiveRenterController');
Route::post('active_renter/utility_bills', 'API\ActiveRenterController@storeUtilityBill');
Route::post('active_renter/electric_bills', 'API\ActiveRenterController@storeElectricBill');
Route::get('active_renter_details', 'API\ActiveRenterController@getActiveRenters');
Route::get('renter_details/{id}', 'API\ActiveRenterController@getRenterDetails');
Route::get('renters/info/{id}', 'API\RenterController@getRenterInformation');
Route::get('get_utility_bill_details/{id}', 'API\BillCalculationController@getUtilityBillDetails');
Route::post('update_renter_details/{id}', 'API\BillCalculationController@updateRentDetails')->name('updateRentDetails');
Route::resource('create_bills', 'API\CreateBillController');
Route::resource('reports', 'API\ReportController');


