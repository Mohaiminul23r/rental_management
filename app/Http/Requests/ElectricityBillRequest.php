<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElectricityBillRequest extends FormRequest
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
        if($this->route()->getName() == 'update_other_bills'){
            return [
                
            ];
        }

        else if($this->route()->getName() == 'electric_bills.store'){
            return [
                'bill_type_id'       => 'required',    
                'minimum_unit'       => 'required',    
                //'duty_on_kwh'        => 'required',    
                'demand_charge'      => 'required',    
                'machine_charge'     => 'required',
                'service_charge'     => 'required',
                'vat'                => 'required',
                'delay_charge'       => 'required',
            ];
        } 

        else if($this->route()->getName() == 'electric_bills.update'){
            return [
               
            ];
        }   
    }

    public function messages(){
         return [
            'bill_type_id.required'      => 'Select bill type',
            'minimum_unit.required'      => 'Enter minimum unit',
            //'duty_on_kwh.required'       => 'Enter Kilowatt hour',
            'demand_charge.required'     => 'Enter demand charge',
            'machine_charge.required'    => 'Enter machine charge',
            'service_charge.required'    => 'Enter service charge',
            'vat.required'               => 'Enter VAT',
            'delay_charge.required'      => 'Enter delay charge',
        ];
    }
}
