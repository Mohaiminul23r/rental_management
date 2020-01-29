<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ActiveRenter extends Model
{
    use CommonTrait;
    protected $fillable = [
    	'renter_information_id',
    	'renter_type_id',
    	'complex_id',
    	'shop_name',
    	'level_no',
    	'rent_amount',
        'advance_amount',
    	'rent_started_at',
    	'rent_ended_at',
    	'status'
    ];
 
    public function renter_information(){
        return $this->belongsTo('App\Model\RenterInformation');
    }
    public function complex(){
        return $this->belongsTo('App\Model\Complex');
    }

    public function renter_type(){
        return $this->belongsTo('App\Model\RenterType');
    }

    public function utility_bill(){
        return $this->hasOne('App\Model\UtilityBill');
    }
}
