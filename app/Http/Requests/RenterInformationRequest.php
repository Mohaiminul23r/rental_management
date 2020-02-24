<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenterInformationRequest extends FormRequest
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
        if($this->route()->getName() == 'renters.update'){
            $renter = $this->all();
           // dd($renter);
            return [
                
            ];
        }

        if($this->route()->getName() == 'renters.store'){
            return [
                'renter_name'     => 'required',    
                'father_name'     => 'required',    
                'email'           => 'nullable|email|unique:renter_information',     
                'phone_no'        => 'nullable|unique:renter_information',    
                'nid_no'          => 'nullable|unique:renter_information',    
                //'mobile_no'       => 'required|unique:renter_information|regex:/(01)[0-9]{9}/',          
                'mobile_no'       => 'required|unique:renter_information',          
            ];
        }
    }

    public function messages(){
         return [
            'renter_name.required'   => 'Enter renter name',
            'father_name.required'   => 'Enter father name',
            'mobile_no.required'     => 'Enter mobile no.',
            'mobile_no.unique'       => 'Mobile no already exist',
            'mobile_no.regex'        => 'Mobile no is not valid',
            'phone_no.unique'        => 'Phone no already exist',
            'email.email'            => 'Enter valid email',
            'email.unique'           => 'Enter already exist',
            'nid_no.unique'          => 'NID already exist',
        ];
    }
}
