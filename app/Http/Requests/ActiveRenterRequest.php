<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActiveRenterRequest extends FormRequest
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
            'renter_id'          => 'required',    
            'renter_type_id'     => 'required',    
            'complex_id'         => 'required',    
            'shop_id'            => 'required',    
            'level_no'           => 'required',
            'rent_started_at'    => 'required',
            // 'advance_amount'     => 'required',
            'rent_amount'        => 'required',
        ];
    }

    public function messages(){

         return [
            'renter_id.required'          => 'Select renter name',
            'renter_type_id.required'     => 'Select renter type',
            'complex_id.required'         => 'Select Complex',
            'shop_id.required'            => 'Select Shop',
            'level_no.required'           => 'Enter level number',
            'rent_started_at.required'    => 'Enter renter active date',
            'rent_amount.required'        => 'Enter rent amount',
        ];
    }
}
