<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RenterType;
use App\Model\City;
use App\Model\Thana;
use App\Model\Country;

class CommonController extends Controller
{
    public function renterIndex(){
        $renterType = RenterType::all();
        $city = City::orderBy('name')->get();
        $thana = Thana::orderBy('name')->get();
        $country = Country::orderBy('name')->get();
        return view('renter.index',['renterType' => $renterType, 'city' => $city, 'thana' => $thana, 'country' => $country]);
    }

    public function thanaIndex(){
    	$city = City::orderBy('name')->get();
    	return view('admin.thana.index', ['city' => $city]);
    }
}
