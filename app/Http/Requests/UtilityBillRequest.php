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

        if($this->route()->getName() == 'utilitybills.update'){
            $utility_bill = $this->all();
            return [
       
            ]; 
        }

       else if($this->route()->getName() == 'store_utility_bills'){
            return [
                'active_renter_id'  => 'required | unique:utility_bills',
                'house_rent'        => 'required',
            ];
        }
        
    }

    public function messages(){
         return [
            'active_renter_id.required'   => 'Select active renter',
            'house_rent.required'         => 'Add home rent',
            'active_renter_id.unique'     => 'Renter already exist',
        ];
    }
}
