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
            'last_name'       => 'required',    
            'father_name'     => 'required',    
            'mother_name'     => 'required',    
            'phone'           => 'required',    
            'mobile'          => 'required',    
            'gender'          => 'required',    
            'date_of_birth'   => 'required',    
            'renter_type_id'  => 'required',    
            'status'          => 'required'   
        ];
    }

    public function messages(){

         return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
        ];
    }
}
