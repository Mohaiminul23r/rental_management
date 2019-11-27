<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use CommonTrait;
    protected $fillable = [
    	'country_id',
    	'name',
    ];

    public function country(){
    	return $this->belongsTo('App\Model\Country');
    }

    public function address(){
    	return $this->hasMany('App\Model\Address');
    }

    public function thana(){
        return $this->hasMany('App\Model\Thana');
    }
}
