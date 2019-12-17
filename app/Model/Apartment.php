<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
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
