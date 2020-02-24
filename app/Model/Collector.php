<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    use CommonTrait;
    protected $fillable = [
    	'collectorID',
    	'collector_name',
    	'father_name',
    	'mother_name',
    	'email',
    	'contact_no',
    	'nid_no',
    	'date_of_birth',
    	'present_address',
    	'permanent_address',
    	'gender',
    	'status'
    ];
}
