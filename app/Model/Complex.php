<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
   use CommonTrait;

    protected $fillable = [
    	'name',
    	'apartment_no',
    	'description',
    	'mother_name',
    	'house_id',
    	'rent_amount',
    	'status'
    ];

}
