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
Route::post('renters/add_file', 'API\RenterController@store_files')->name('renters.add_file');
Route::get('renters/added_files/{id}', 'API\RenterController@getAddedFiles')->name('renters.added_files');
Route::get('get_renter_informaiton_id', 'API\RenterController@getRenterInformationId');
//Route::get('uploaded_files', 'API\RenterController@fileDataTable');

Route::resource('thanas', 'API\ThanaController');
Route::resource('houses', 'API\HouseController');
Route::resource('apartments', 'API\ApartmentController');
Route::resource('shops', 'API\ShopController');
Route::resource('advance_payments', 'API\AdvancePaymentController');
Route::resource('electric_bills', 'API\ElectricityBillController');
Route::resource('active_renters', 'API\ActiveRenterController');
Route::post('active_renter/utility_bills', 'API\ActiveRenterController@storeUtilityBill')->name('store_utility_bills');
Route::post('active_renter/electric_bills', 'API\ActiveRenterController@storeElectricBill')->name('create_electric_bills');
Route::get('active_renter_details', 'API\ActiveRenterController@getActiveRenters');
Route::get('renter_details/{id}', 'API\ActiveRenterController@getRenterDetails');
Route::get('renters/info/{id}', 'API\RenterController@getRenterInformation');
Route::get('get_utility_bill_details/{id}', 'API\BillCalculationController@getUtilityBillDetails');
Route::get('get_other_bill_details/{id}', 'API\BillCalculationController@getOtherBillDetails')->name('get_other_bill_details');
Route::post('update_renter_details/{id}', 'API\BillCalculationController@updateRentDetails')->name('update_rent_details');
Route::post('update_utility_bills/{id}', 'API\BillCalculationController@updateUtilityBills')->name('update_utility_bills');
Route::post('update_electric_bills/{id}', 'API\BillCalculationController@updateElectricBills')->name('update_electric_bills');
Route::post('update_other_bill_details/{id}', 'API\BillCalculationController@updateOtherBills')->name('update_other_bills');
Route::resource('create_bills', 'API\CreateBillController');
Route::resource('reports', 'API\ReportController');


