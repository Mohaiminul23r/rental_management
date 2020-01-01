<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateElectricBillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
    {
        return [
            'bill_no'             => 'required | unique:monthly_bills',    
            'billing_year'        => 'required',    
            'billing_month'       => 'required',    
            'date_of_issue'       => 'required',    
            'last_payment_date'   => 'required',
            'total_ebill'         => 'required',
           // 'electric_bill'       => 'required',
        ];
    }

    public function messages(){
         return [
            'bill_no.required'             => 'Enter bill number',
            'bill_no.unique'               => 'Bill number already exist',
            'billing_year.required'        => 'Select billing year',
            'billing_month.required'       => 'Select billing month',
            'date_of_issue.required'       => 'Enter bill issue date',
            'last_payment_date.required'   => 'Enter last payment date',
            'total_ebill.required'         => 'Enter electric bill',
           // 'electric_bill.required'         => 'Enter electric bill',
        ];
    }
}
