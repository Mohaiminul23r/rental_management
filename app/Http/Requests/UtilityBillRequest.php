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

        if($this->route()->getName() == 'update_utility_bills'){
            $utility_bill = $this->all();
            return [
       
            ]; 
        }

       else if($this->route()->getName() == 'store_utility_bills'){
            return [
                'bill_type_id'      => 'required',    
                // 'water_bill'        => 'required',    
                 'gas_bill'          => 'required',       
                // 'service_charge'    => 'required',
                //'other_charge'      => 'required',
                // 'advance_amount' => 'required',
                'active_renter_id'  => 'required',
            ];
        }
        
    }

    public function messages(){
         return [
            'bill_type_id.required'       => 'Select bill type',
            'gas_bill.required'           => 'Enter gas bill',
            'active_renter_id.required'   => 'Select active renter',
        ];
    }
}
