<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\MonthlyBills;
use App\Http\Requests\CreateElectricBillRequest;

class CreateBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $monthly_bills = new MonthlyBills();
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

             // $search['renters.first_name'] = $request->input('search')['value'];
             // $search['shops.name'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

        $with = [

            ]; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            // ['renters', 'active_renters.renter_id', 'renters.first_name as renterFirstName'],
            // ['shops', 'active_renters.shop_id', 'shops.name as shopName'],
        ];  
       return $monthly_bills->GetDataForDataTable($limit, $offset, $search, $where, $with, $join); 
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
    public function store(CreateElectricBillRequest $request)
    {
        //dd($request->all());
        $create_ebill = new MonthlyBills();
        $create_ebill->active_renters_id   = $request->active_renters_id;
        $create_ebill->bill_no             = $request->bill_no;
        $create_ebill->billing_year        = $request->billing_year;
        $create_ebill->billing_month       = $request->billing_month;
        $create_ebill->unit_rate           = $request->unit_rate;
        $create_ebill->present_reading     = $request->present_reading;
        $create_ebill->consumed_unit       = $request->consumed_unit;
        $create_ebill->electric_bill       = $request->electric_bill;
        $create_ebill->principle_amount    = $request->principle_amount;
        $create_ebill->service_charge      = $request->service_charge;
        $create_ebill->date_of_issue       = $request->date_of_issue;
        $create_ebill->last_payment_date   = $request->last_payment_date;
        $create_ebill->total_ebill         = $request->total_ebill;
        $create_ebill->save();
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
}
