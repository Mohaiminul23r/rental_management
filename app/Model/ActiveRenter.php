<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ActiveRenter extends Model
{
    use CommonTrait;
    protected $fillable = [
    	'renter_id',
    	'renter_type_id',
    	'apartment_id',
    	'shop_id',
    	'level_no',
    	'rent_amount',
      'advance_amount',
    	'rent_started_at',
    	'rent_ended_at',
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

   public function renter_type(){
    return $this->belongsTo('App\Model\RenterType');
   }

   public function utility_bill(){
    return $this->hasOne('App\Model\UtilityBill');
   }
}
