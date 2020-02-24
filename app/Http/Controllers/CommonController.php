<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\RenterType;
use App\Model\BillType;
use App\Model\City;
use App\Model\Thana;
use App\Model\RenterInformation;
use App\Model\Complex;
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
        $renter  = RenterInformation::orderBy('renter_name')->get();
        $complex = Complex::orderBy('name')->get();
        $shop    = Shop::orderBy('name')->get();
        return view('advance_payment.index', ['renter' => $renter, 'complex' => $complex, 'shop' => $shop]);
    }

    public function electricityBillIndex(){
        $bill_type    = BillType::orderBy('name')->get();
        return view('settings.electric_bill.index', ['bill_type' => $bill_type]);
    }

    public function activeRenterIndex(){
        $renterType = RenterType::all();
        $renter  = RenterInformation::orderBy('renter_name')->get();
        $complex = Complex::orderBy('name')->get();
        $bill_type    = BillType::orderBy('name')->get();
        $activeRenter  = DB::table('renter_information')
                    ->join('active_renters', 'renter_information.id', '=', 'active_renters.renter_information_id')
                    ->select('renter_information.renter_name', 'renter_information.father_name', 'renter_information.mother_name','active_renters.*')
                    ->get();            
        return view('active_renter.index', ['renterType' => $renterType,'renter' => $renter, 'complex' => $complex, 'bill_type' => $bill_type, 'activeRenter' => $activeRenter]);
    }

    public function renterDetailsReportIndex(){
        $renterType = RenterType::all();
        $renter_info  = RenterInformation::orderBy('renter_name')->get();
        $complex = Complex::orderBy('name')->get();
        $bill_type    = BillType::orderBy('name')->get();
        $activeRenter  = DB::table('renter_information')
                    ->join('active_renters', 'renter_information.id', '=', 'active_renters.renter_information_id')
                    ->select('renter_information.renter_name','renter_information.father_name', 'renter_information.mother_name','active_renters.*')
                    ->get();
        return view('renter_details.renter_information', ['renterType' => $renterType,'renter_info' => $renter_info, 'complex' => $complex,'bill_type' => $bill_type, 'activeRenter' => $activeRenter]);
    }

    public function createBillIndex(){
        $activeRenter  = DB::table('renters')
                        ->join('active_renters', 'renters.id', '=', 'active_renters.renter_id')
                        ->select('renters.first_name', 'renters.last_name', 'renters.father_name', 'renters.mother_name','active_renters.*')
                        ->get();
        $renter_info  = Renter::orderBy('first_name')->get();
        return view('create_bill.index', ['renter_info' => $renter_info, 'activeRenter' => $activeRenter]);
    }

    public function generateReportIndex(){
        return view('report.index');
    }

    public function documentIndex(){
        $renters  = RenterInformation::orderBy('renter_name')->get();
        return view('upload_documents.index',['renters'=>$renters]);
    }

    public function collectorIndex(){
        return view('settings.collector.index');
    }
    public function edit_renter_info($id){
        $renter_id = $id;
        $renterType = RenterType::all();
        return view('renter.edit_renter_info',['renterType' => $renterType, 'renter_id' => $renter_id]);
    }

}
