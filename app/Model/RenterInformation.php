<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RenterInformation extends Model
{
    use CommonTrait;

    protected $fillable = [
    	'renter_name',
    	'father_name',
    	'mother_name',
        'email',
    	'phone_no',
    	'mobile_no',
    	'nid_no',
        'nationality',
    	'date_of_birth',
        'occupation',
        'present_address',
        'permanent_address',
        'gender',
    	'renter_type_id',
    	'status'
    ];

public function rentertype(){
   	return $this->belongsTo('App\Model\RenterType');
   }

public function address(){
    return $this->belongsTo('App\Model\Address');
   }

public function files()
{
    return $this->morphMany('App\Model\File', 'fileable');
}
// public function activeRenter(){
//     return $this->belongsTo('App\Model\ActiveRenter');
//    }
}
