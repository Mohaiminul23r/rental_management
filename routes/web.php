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
        return view('admin.country.index');
    });

    Route::get('thanas', function(){
    	return view('admin.thana.index');
    });

    Route::get('billtypes', function(){
    	return view('admin.billtype.index');
    });

     Route::get('rentertypes', function(){
    	return view('admin.rentertype.index');
    });

    Route::get('houses', function(){
        return view('settings.house.index');
    });

    Route::get('apartments', function(){
        return view('settings.apartment.index');
    });

    Route::get('shops', function(){
        return view('settings.shop.index');
    });

     Route::get('renters', "CommonController@renterIndex");

     Route::get('thanas', "CommonController@thanaIndex");

     Route::get('cities', "CommonController@cityIndex");
});
//resource routes
