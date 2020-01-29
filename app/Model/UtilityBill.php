<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UtilityBill extends Model
{
    protected $fillable = [
    	'active_renter_id',
    	'house_rent',
    	'electric_bill',
        'water_bill',
    	'gas_bill',
        'internet_bill',
    	'service_charge',
    	'other_charge',
        'total_monthly_rent',
    	'status'
    ];

    public function active_renter(){
       	return $this->belongsTo('App\Model\ActiveRenter');
       }

    public function collection(){
        return $this->hasMany('App\Model\Collection');
       }
}
