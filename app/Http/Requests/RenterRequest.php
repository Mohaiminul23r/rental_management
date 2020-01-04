<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenterRequest extends FormRequest
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
            'first_name'      => 'required',    
            //'last_name'       => 'required',    
            'father_name'     => 'required',    
            'email'           => 'email | unique:renters',    
           // 'mother_name'     => 'required',    
           // 'phone'           => 'required',    
            'mobile'          => 'required | unique:renters',    
            // 'gender'          => 'required',    
            // 'nid_no'          => 'required',    
            // 'nid_photo'       => 'required',    
            //'photo'           => 'required',    
            //'date_of_birth'   => 'required',    
            'renter_type_id'  => 'required',    
            'address_line1'   => 'required',    
            'thana_id'        => 'required',    
            'postal_code'     => 'required',    
            'city_id'         => 'required',    
           // 'country_id'      => 'required',    
            'status'          => 'required'   
        ];
    }

    public function messages(){

         return [
            'first_name.required'    => 'Enter renter first name',
            'father_name.required'   => 'Enter father name',
            'mobile.required'        => 'Enter concact number',
            'mobile.unique'          => 'Mobile no already exist',
            'address_line1.required' => 'Enter address area',
            'address_line1.required' => 'Enter address area',
            'thana_id.required'      => 'Select thana name',
            'postal_code.required'   => 'Enter post code',
            'city_id.required'       => 'Select city name',
        ];
    }
}
