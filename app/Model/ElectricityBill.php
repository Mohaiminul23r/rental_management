<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ElectricityBill extends Model
{
    use CommonTrait;
    protected $fillable = [
    	'bill_type_id',
    	'minimum_unit',
    	'duty_on_kwh',
    	'demand_charge',
    	'machine_charge',
        'service_charge',
        'vat',
        'delay_charge',
    	'status',
    ];

    public function bill_type(){
    	return $this->belongsTo('App\Model\BillType');
    }
}
