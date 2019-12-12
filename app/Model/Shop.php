<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use CommonTrait;
     protected $fillable = [
    	'name',
    	'description',
    	'house_id',
    	'rent_amount',
    	'status',
    ];

    public function house(){
    	return $this->belongsTo('App\Model\House');
    }
}
