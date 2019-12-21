<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UtilityBill extends Model
{
    protected $fillable = [
    	'active_renter_id',
    	'bill_type_id',
    	'water_bill',
    	'is_wbill_required',
    	'gas_bill',
    	'is_gbill_required',
    	'service_charge',
    	'other_charge',
    	'electric_meter_no',
    	'opening_reading',
    	'fix_ebill_amount',
    	'is_ebill_fixed',
    	'status'
    ];

public function active_renter(){
   	return $this->belongsTo('App\Model\ActiveRenter');
   }

public function bill_type(){
    return $this->belongsTo('App\Model\BillType');
   }
}
