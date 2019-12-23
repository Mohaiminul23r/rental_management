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
use App\Model\ActiveRenter;
use App\Model\ElectricityBill;
use DB;

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

    public function activeRenterIndex(){
        $renterType = RenterType::all();
        $renter  = Renter::orderBy('first_name')->get();
        $complex = Apartment::orderBy('name')->get();
        $shop    = Shop::orderBy('name')->get();
        $bill_type    = BillType::orderBy('name')->get();
        $activeRenter  = DB::table('renters')
                    ->join('active_renters', 'renters.id', '=', 'active_renters.renter_id')
                    ->select('renters.first_name', 'renters.last_name', 'renters.father_name', 'renters.mother_name','active_renters.*')
                    ->get();

        $electricity_bill  = ElectricityBill::with('bill_type')->get();
                    
        return view('active_renter.index', ['renterType' => $renterType,'renter' => $renter, 'complex' => $complex, 'shop' => $shop, 'bill_type' => $bill_type, 'activeRenter' => $activeRenter, 'electricity_bill' => $electricity_bill]);
    }

    public function renterDetailsReportIndex(){
        $renterType = RenterType::all();
        $renter_info  = Renter::orderBy('first_name')->get();
        $complex = Apartment::orderBy('name')->get();
        $shop    = Shop::orderBy('name')->get();
        $bill_type    = BillType::orderBy('name')->get();
        $activeRenter  = DB::table('renters')
                    ->join('active_renters', 'renters.id', '=', 'active_renters.renter_id')
                    ->select('renters.first_name', 'renters.last_name', 'renters.father_name', 'renters.mother_name','active_renters.*')
                    ->get();

        $electricity_bill  = ElectricityBill::with('bill_type')->get();
        return view('renter_details.renter_information', ['renterType' => $renterType,'renter_info' => $renter_info, 'complex' => $complex, 'shop' => $shop, 'bill_type' => $bill_type, 'activeRenter' => $activeRenter, 'electricity_bill' => $electricity_bill]);
    }
}
