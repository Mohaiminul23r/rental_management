<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ElectricityBill;
use App\Http\Requests\ElectricityBillRequest;

class ElectricityBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $electricityBill = new ElectricityBill();
        $limit = 20;
        $offset = 0;
        $search = [];
        $where = [];
        $with = [];
        $join = [];

        if($request->input('length')){
            $limit = $request->input('length');
        }

        if($request->input('start')){
            $offset = $request->input('start');
        }

        if($request->input('search') && $request->input('search')['value'] != ""){

            // $search['cities.name'] = $request->input('search')['value'];
            // $search['countries.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

        $with = [

            ]; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
           ['bill_types', 'electricity_bills.bill_type_id', 'bill_types.name as billTypeName']
        ];  

       return $electricityBill->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
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
    public function store(ElectricityBillRequest $request)
    {
      //  dd($request->all());
        $electricityBill = new ElectricityBill();
        $electricityBill->bill_type_id   = $request->bill_type_id;
        $electricityBill->minimum_unit   = $request->minimum_unit;
        $electricityBill->duty_on_kwh    = $request->duty_on_kwh;
        $electricityBill->demand_charge  = $request->demand_charge;
        $electricityBill->machine_charge = $request->machine_charge;
        $electricityBill->service_charge = $request->service_charge;
        $electricityBill->vat            = $request->vat;
        $electricityBill->delay_charge   = $request->delay_charge;
        $electricityBill->save();
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
        return ElectricityBill::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ElectricityBillRequest $request, ElectricityBill $electricityBill)
    {
        $electricityBill->bill_type_id   = $request->bill_type_id;
        $electricityBill->minimum_unit   = $request->minimum_unit;
        $electricityBill->duty_on_kwh    = $request->duty_on_kwh;
        $electricityBill->demand_charge  = $request->demand_charge;
        $electricityBill->machine_charge = $request->machine_charge;
        $electricityBill->service_charge = $request->service_charge;
        $electricityBill->vat            = $request->vat;
        $electricityBill->delay_charge   = $request->delay_charge;
        $electricityBill->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $electricityBill = ElectricityBill::findOrFail($id);
        $electricityBill->delete();
    }
}
