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

class ActiveRenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $activeRenter = new ActiveRenter();
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
             $search['shops.name'] = $request->input('search')['value'];
             $search['apartments.name'] = $request->input('search')['value'];
             $search['active_renters.level_no'] = $request->input('search')['value'];
             $search['active_renters.rent_started_at'] = $request->input('search')['value'];
        }

        if($request->input('where')){
            $where = $request->input('where');
        }

        $with = [

            ]; 

        $join = [ 
            /* "table name",  "table2 name. id" , "unique column name by as"   */
            ['renters', 'active_renters.renter_id', 'renters.first_name as renterFirstName'],
            ['shops', 'active_renters.shop_id', 'shops.name as shopName'],
            ['apartments', 'active_renters.apartment_id', 'apartments.name as complexName'],
            ['renter_types', 'active_renters.renter_type_id', 'renter_types.name as renterTypeName'],
  
        ];  
       return $activeRenter->GetDataForDataTable($limit, $offset, $search, $where, $with, $join);
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

    public function store(ActiveRenterRequest $request)
    {
        //dd($request->all());
        $activeRenter = new ActiveRenter();
        $activeRenter->renter_id         = $request->renter_id;
        $activeRenter->renter_type_id    = $request->renter_type_id;
        $activeRenter->apartment_id      = $request->apartment_id;
        $activeRenter->shop_id           = $request->shop_id;
        $activeRenter->level_no          = $request->level_no;
        $activeRenter->rent_amount       = $request->rent_amount;
        $activeRenter->advance_amount    = $request->advance_amount;
        $activeRenter->rent_started_at   = $request->rent_started_at;
       // $activeRenter->rent_ended_at     = $request->rent_ended_at;
        $activeRenter->save();

    }

     public function storeUtilityBill(UtilityBillRequest $request)
    {
       // dd($request->all());
        $utilityBill = new UtilityBill();
        $utilityBill->active_renter_id    = $request->active_renter_id;
        $utilityBill->bill_type_id        = $request->bill_type_id;
        $utilityBill->water_bill          = $request->water_bill;
        $utilityBill->is_wbill_required   = $request->is_wbill_required;
        $utilityBill->gas_bill            = $request->gas_bill;
        $utilityBill->is_gbill_required   = $request->is_gbill_required;
        $utilityBill->service_charge      = $request->service_charge;
        $utilityBill->other_charge        = $request->other_charge;
        //$utilityBill->status            = $request->status;
        $utilityBill->save();
    }

    public function storeElectricBill(ElectricBillDetailRequest $request)
    {
       // dd($request->all());
        $electricBill_data = DB::table('utility_bills')->where('active_renter_id', '=', $request->active_renter_id2)->first();
        $electricBill = UtilityBill::findOrFail($electricBill_data->id);
        $electricBill->electric_meter_no       = $request->electric_meter_no;
        $electricBill->is_ebill_fixed          = $request->is_ebill_fixed;
        $electricBill->opening_reading         = $request->opening_reading;
        $electricBill->fix_ebill_amount        = $request->fix_ebill_amount;
        $electricBill->electricity_bill_id    = $request->electricity_bill_id;
        $electricBill->save();
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
        $activeRenter = ActiveRenter::findOrFail($id);
        $activeRenter->delete();
    }

  public function getActiveRenters(){
        $active_renters = DB::table('renters')
                        ->join('active_renters', 'renters.id', '=', 'active_renters.renter_id')
                        ->select('renters.first_name', 'renters.last_name', 'renters.father_name', 'renters.mother_name','active_renters.*')
                        ->get();
        return $active_renters;
    }

    public function getRenterDetails($id)
    {
        $renter_info = ActiveRenter::with('renter')->whereId($id)->first();
        return $renter_info;
    }
}
