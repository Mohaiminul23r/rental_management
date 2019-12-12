<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use CommonTrait;
    protected $fillable = [
    	'house_name',
    	'house_number',
    	// 'number_of_levels',
    	// 'address_id',
    	'status',
    ];

    public function apartment(){
    	return $this->hasMany('App\Model\Apartment');
    }

    public function address(){
    	return $this->belongsTo('App\Model\Address');
    }
}
