<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BillType extends Model
{
   use CommonTrait;
   protected $fillable = [
   		'name',
   		'status',
   ];

   public function gasBill(){
   	return $this->belongsTo('App\Model\GasBill');
   }

   public function waterBill(){
   	return $this->belongsTo('App\Model\WaterBill');
   }

   public function electricityBill(){
   	return $this->belongsTo('App\Model\ElectricityBill');
   }
}
