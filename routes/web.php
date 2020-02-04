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
Route::get('/', function () {
	 return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'API\HomeController@index')->name('home');

    Route::get('countries', function(){
        return view('settings.country.index');
    });

    Route::get('thanas', function(){
    	return view('settings.thana.index');
    });

    Route::get('billtypes', function(){
    	return view('settings.billtype.index');
    });

     Route::get('rentertypes', function(){
    	return view('settings.rentertype.index');
    });

    Route::get('houses', function(){
        return view('settings.house.index');
    });

    Route::get('complexes', function(){
        return view('settings.complex.index');
    });

    Route::get('shops', function(){
        return view('settings.shop.index');
    });
     Route::get('renters', "CommonController@renterIndex");
     Route::get('thanas', "CommonController@thanaIndex");
     Route::get('cities', "CommonController@cityIndex");
     Route::get('advance_payments', "CommonController@advancePaymentIndex");
     Route::get('electric_bills', "CommonController@electricityBillIndex");
     Route::get('active_renters', "CommonController@activeRenterIndex");  
     Route::get('renter_details', "CommonController@renterDetailsReportIndex");
     Route::get('create_bills', "CommonController@createBillIndex");
     Route::get('reports', "CommonController@generateReportIndex");
     Route::get('edit_renter_info/{id}', "CommonController@edit_renter_info");
     
     Route::get('add_renter_info', function(){
        $renterType = App\Model\RenterType::orderBy('name')->get();
        return view('renter.add_renter_info', ['renterType' => $renterType]);
     });
});
//resource routes
