<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use CommonTrait;

    protected $fillable = [
    	'first_name',
    	'last_name',
    	'father_name',
    	'mother_name',
    	'address_id',
    	'date_of_birth',
    	'photo',
    	'nid_photo',
    	'phone',
    	'mobile',
    	'nid_no',
    	'renter_type_id',
    	'status'
    ];

public function rentertype(){
   	return $this->belongsTo('App\Model\RenterType');
   }

public function address(){
    return $this->belongsTo('App\Model\Address');
   }
}
