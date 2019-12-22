<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilityBillRequest extends FormRequest
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
            'bill_type_id'      => 'required',    
            'water_bill'        => 'required',    
            'gas_bill'          => 'required',       
            'service_charge'    => 'required',
            'other_charge'      => 'required',
            // 'advance_amount' => 'required',
            'active_renter_id'  => 'required',
        ];
    }

    public function messages(){

         return [
            'bill_type_id.required'          => 'Select renter name',
            'water_bill.required'     => 'Select renter type',
            'gas_bill.required'         => 'Select Complex',
            'service_charge.required'            => 'Select Shop',
            'other_charge.required'           => 'Enter level number',
            'active_renter_id.required'    => 'Enter renter active date',
        ];
    }
}
