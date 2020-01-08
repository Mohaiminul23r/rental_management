<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ActiveRenter;
use App\Model\UtilityBill;
use App\Http\Requests\ActiveRenterRequest;
use App\Http\Requests\UtilityBillRequest;
use App\Http\Requests\ElectricBillDetailRequest;
use DB;

class BillCalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getUtilityBillDetails($id){
        $utilityBills = UtilityBill::with('active_renter', 'active_renter.renter', 'active_renter.shop','active_renter.apartment', 'active_renter.renter_type', 'bill_type', 'electricity_bill')->whereId($id)->first();
        return $utilityBills;
    }

    public function updateRentDetails(ActiveRenterRequest $request, $id){
        //dd($request->all());
        $acr_id = $request->active_renter_id_3;
        $active_renter = ActiveRenter::findOrFail($acr_id);
        $active_renter->renter_id         = $request->renter_id;
        $active_renter->renter_type_id    = $request->renter_type_id;
        $active_renter->apartment_id      = $request->apartment_id;
        $active_renter->shop_id           = $request->shop_id;
        $active_renter->level_no          = $request->level_no;
        $active_renter->rent_amount       = $request->rent_amount;
        $active_renter->advance_amount    = $request->advance_amount;
        $active_renter->rent_started_at   = $request->rent_started_at;
        $active_renter->update();
    }

    public function updateUtilityBills(UtilityBillRequest $request, $id){
       // dd($request->all());
        $ubill_id = $request->ubill_id_2;
        $utility_bill = UtilityBill::findOrFail($ubill_id);
       // dd($utility_bill);
        $utility_bill->bill_type_id        = $request->bill_type_id;
        $utility_bill->water_bill          = $request->water_bill;
        $utility_bill->is_wbill_required   = $request->is_wbill_required;
        $utility_bill->gas_bill            = $request->gas_bill;
        $utility_bill->is_gbill_required   = $request->is_gbill_required;
        $utility_bill->service_charge      = $request->service_charge;
        $utility_bill->other_charge        = $request->other_charge;
        $utility_bill->update();
        //dd($utility_bill);
       echo $utility_bill;
    }
}
