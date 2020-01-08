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
        if($this->route()->getName() == 'update_rent_details'){
            $active_renter = $this->all();
          // dd($active_renter);
            return [
                'renter_id'          => 'required | unique:active_renters,renter_id,'.$active_renter['active_renter_id_3'],    
                'renter_type_id'     => 'required',    
                'apartment_id'       => 'unique:active_renters,apartment_id,'.$active_renter['active_renter_id_3'],    
                'shop_id'            => 'unique:active_renters,shop_id,'.$active_renter['active_renter_id_3'],    
                'level_no'           => 'unique:active_renters,level_no,'.$active_renter['active_renter_id_3'],
                'rent_started_at'    => 'required',
                'rent_amount'        => 'required',
                'advance_amount'     => 'required',
            ];
        }

        else if($this->route()->getName() == 'active_renters.store'){
             return [
                'renter_id'          => 'required | unique:active_renters',    
                'renter_type_id'     => 'required',    
                'apartment_id'       => 'unique:active_renters',    
                'shop_id'            => 'unique:active_renters',    
                'level_no'           => 'unique:active_renters',
                'rent_started_at'    => 'required',
                'rent_amount'        => 'required',
                'advance_amount'     => 'required',
            ];
        }  
    }

    public function messages(){
         return [
            'renter_id.required'          => 'Select renter name',
            'renter_id.unique'            => 'Renter already exist',
            'renter_type_id.required'     => 'Select renter type',
            'apartment_id.unique'         => 'Complex already exist',
            'shop_id.unique'              => 'Shop already exist',
            'level_no.unique'             => 'Level already taken',
            'rent_started_at.required'    => 'Enter renter active date',
            'rent_amount.required'        => 'Enter rent amount',
            'advance_amount.required'     => 'Enter advance amount',
        ];
    }
}
