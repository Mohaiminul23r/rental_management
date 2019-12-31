<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MonthlyBills extends Model
{
    use CommonTrait;
    protected $fillable = [
    	'bill_no',
    	'active_renters_id',
    	'billing_year',
    	'billing_month',
    	'unit_rate',
    	'present_reading',
    	'consumed_reading',
    	'electric_bill',
    	'principle_amount',
    	'service_charge',
    	'date_of_issue',
    	'last_payment_date',
    	'total_ebill',
    	'gas_bill',
    	'water_bill',
    	'rent_bill',
    	'vat_amount',
    	'grand_total',
    	'payment_date',
    	'paid_amount',
    	'due_amount',
    	'status'
    ];
}
