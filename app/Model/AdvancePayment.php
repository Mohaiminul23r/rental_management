<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdvancePayment extends Model
{
    use CommonTrait;

    protected $fillable = [
    	'renter_id',
    	'apartment_id',
    	'shop_id',
    	'payment_amount',
    	'date_of_payment',
    	'status'
    ];

   public function renter(){
   	return $this->belongsTo('App\Model\Renter');
   }

   public function apartment(){
   	return $this->belongsTo('App\Model\Apartment');
   }

   public function shop(){
   	return $this->belongsTo('App\Model\Shop');
   }

}
