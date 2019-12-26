<?php

namespace App\Model;
use Auth;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	use CommonTrait;
    protected $fillable = [
    	'name',
    ];

    public function cities(){
    	return $this->hasMany('App\Model\City');
    }

     public function address(){
        return $this->belongsTo('App\Model\Address');
    }
}
