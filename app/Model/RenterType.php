<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RenterType extends Model
{
	use CommonTrait;
    protected $fillable = [
    	'name',
    ];

    public function renter(){
   		return $this->belongsTo('App\Model\Renter');
   }
}
