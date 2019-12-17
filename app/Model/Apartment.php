<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use CommonTrait;
    protected $fillable = [
   		'name',
   		'status',
   ];
}
