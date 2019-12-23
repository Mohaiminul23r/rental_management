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
            'renter_id'          => 'required | unique:active_renters',    
            'renter_type_id'     => 'required',    
            'apartment_id'       => 'unique:active_renters',    
            'shop_id'            => 'unique:active_renters',    
            'level_no'           => 'unique:active_renters',
            'rent_started_at'    => 'required',
            // 'advance_amount'     => 'required',
            'rent_amount'        => 'required',
            'advance_amount'     => 'required',
        ];
    }

    public function messages(){

         return [
            'renter_id.required'          => 'Select renter name',
            'renter_id.unique'            => 'Renter already exist',
            'renter_type_id.required'     => 'Select renter type',
            'apartment_id.unique'           => 'Complex already exist',
            'shop_id.unique'              => 'Shop already exist',
            'level_no.unique'             => 'Level already taken',
            'rent_started_at.required'    => 'Enter renter active date',
            'rent_amount.required'        => 'Enter rent amount',
            'advance_amount.required'     => 'Enter advance amount',
        ];
    }
}
