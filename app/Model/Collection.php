<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
	protected $fillable = [
		'active_renters_id',
		'utility_bill_id',
		'bill_type_id',
		'billing_year',
		'billing_month',
		'total_monthly_rent',
		'paid_amount',
		'due_amount',
		'payment_date',
		'collection_slip_no',
		'status'
	];

    public function active_renter(){
    	return $this->belongsTo('App\Model\ActiveRenter');
    }
    public function utility_bill(){
    	return $this->belongsTo('App\Model\UtilityBill');
    }
    public function bill_type(){
    	return $this->hasMany('App\Model\BillType');
    }
}
