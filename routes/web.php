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
     Route::get('advance_payments', "CommonController@advancePaymentIndex");
     Route::get('electric_bills', "CommonController@electricityBillIndex");
     Route::get('active_renters', "CommonController@activeRenterIndex");  
     Route::get('renter_details', "CommonController@renterDetailsReportIndex");
     Route::get('create_bills', "CommonController@createBillIndex");
     Route::get('reports', "CommonController@generateReportIndex");
     Route::get('edit_renter_info/{id}', "CommonController@edit_renter_info");
     Route::get('upload_documents', "CommonController@documentIndex");
     Route::get('collectors', "CommonController@collectorIndex");
});
//resource routes
