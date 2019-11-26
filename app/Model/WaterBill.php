<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WaterBill extends Model
{
     protected $fillable = [
    	'apartment_id',
    	'shop_id',
    	'bill_type_id',
    	'billing_month',
    	'amount',
    	'status',
    ];

    public function shop(){
    	return $this->belongsTo('App\Model\Shop');
    }

    public function apartment(){
    	return $this->belongsTo('App\Model\Apartment');
    }
}
