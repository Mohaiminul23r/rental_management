<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
		'address_line1',
		'postal_code',
		'city_id',
		'thana_id',
		'country_id',
    ];

    public function city(){
    	return $this->belongsTo('App\Model\City');
    }

    public function thana(){
    	return $this->belongsTo('App\Model\Thana');
    }

    public function country(){
    	return $this->belongsTo('App\Model\Country');
    }
}
