<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdvancePayment;
use App\Http\Requests\AdvancePaymentRequest;

class AdvancePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $advancePayment = new AdvancePayment();
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

             $search['renters.first_name'] = $request->input('search')['value'];
             $search['apartments.name'] = $request->input('search')['value'];
             $search['shops.name'] = $request->input('search')['value'];
             $search['advance_payments.date_of_payment'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

        $with = [

            ]; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            ['renters', 'advance_payments.renter_id', 'renters.first_name as renterFirstName'],
            ['shops', 'advance_payments.shop_id', 'shops.name as shopName'],
            ['apartments', 'advance_payments.apartment_id', 'apartments.name as complexName'],
  
        ];  
       return $advancePayment->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
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
    public function store(AdvancePaymentRequest $request)
    {
      // dd($request->all());
        $advancePayment = new AdvancePayment();
       // dd($advancePayment);
        $advancePayment->renter_id = $request->renter_id;
        $advancePayment->apartment_id = $request->complex_id;
        $advancePayment->shop_id = $request->shop_id;
        $advancePayment->payment_amount = $request->payment_amount;
        $advancePayment->date_of_payment = $request->date_of_payment;
        $advancePayment->status = $request->status;
        $advancePayment->save();
       // $advancePayment->
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
        return AdvancePayment::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvancePaymentRequest $request, AdvancePayment $advancePayment)
    {
        $advancePayment->renter_id = $request->renter_id;
        $advancePayment->apartment_id = $request->complex_id;
        $advancePayment->shop_id = $request->shop_id;
        $advancePayment->payment_amount = $request->payment_amount;
        $advancePayment->date_of_payment = $request->date_of_payment;
        $advancePayment->status = $request->status;
        $advancePayment->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advancePayment = AdvancePayment::findOrFail($id);
        $advancePayment->delete();
    }
}
