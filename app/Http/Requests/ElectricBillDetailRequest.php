<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElectricBillDetailRequest extends FormRequest
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
        if($this->route()->getName() == 'update_electric_bills'){
            $utility_bill = $this->all();
           // dd($utility_bill);
            return [
                'electric_meter_no'       => 'required | unique:utility_bills,electric_meter_no,'.$utility_bill['ubill_id_3'],           
              //  'electricity_bill_id'     => 'required,'.$utility_bill['ubill_id_3'],
            ]; 
        }

        else if($this->route()->getName() == 'create_electric_bills'){
            return [
                'electric_meter_no'       => 'required | unique:utility_bills',           
                'active_renter_id2'       => 'required',
                'electricity_bill_id'     => 'required',
            ]; 
        }
    }

    public function messages(){
         return [
            'electric_meter_no.required'      => 'Enter electric meter',
            'electric_meter_no.unique'        => 'Electric meter already exist',
            'active_renter_id2.required'      => 'Select active renter',
            'electricity_bill_id.required'    => 'Select electric bill type',
        ];
    }
}
