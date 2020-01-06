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
        dd($request->all());
    }

    public function updateUtilityBills(Request $request, $id){
        dd($id);
    }
}
