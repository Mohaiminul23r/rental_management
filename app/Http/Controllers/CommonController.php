<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RenterType;
use App\Model\BillType;
use App\Model\City;
use App\Model\Thana;
use App\Model\Renter;
use App\Model\Apartment;
use App\Model\Shop;
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

    public function cityIndex(){
        $country = Country::orderBy('name')->get();
        return view('admin.city.index', ['country' => $country]);
    }

    public function advancePaymentIndex(){
        $renter  = Renter::orderBy('first_name')->get();
        $complex = Apartment::orderBy('name')->get();
        $shop    = Shop::orderBy('name')->get();
        return view('advance_payment.index', ['renter' => $renter, 'complex' => $complex, 'shop' => $shop]);
    }

    public function electricityBillIndex(){
        $bill_type    = BillType::orderBy('name')->get();
        return view('settings.electric_bill.index', ['bill_type' => $bill_type]);
    }
}
