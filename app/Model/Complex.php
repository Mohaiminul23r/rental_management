<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
    use CommonTrait;

    protected $fillable = [
    	'name',
    	'complex_no',
    	'status'
    ];

}
