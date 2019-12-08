<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    use CommonTrait;
    protected $fillable = [
  		'city_id',
  		'name',
    ];

    public function city(){
    	return $this->belongsTo('App\Model\Thana');
    }

     public function address(){
    	return $this->belongsTo('App\Model\Address');
    }
}
