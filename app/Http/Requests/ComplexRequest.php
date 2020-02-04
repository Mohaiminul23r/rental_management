<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplexRequest extends FormRequest
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
        if($this->route()->getName() == 'complexes.store'){
            return [
                'name' => 'required',
                'complex_no' => 'required',
            ];
        }

        else if($this->route()->getName() == 'complexes.update'){
             return [
               
            ];
        }  
    }

    public function messages(){

         return [
           'name.required' => 'Complex name is required',   
           'complex_no.required' => 'Enter complex number',   
        ];
    }
}
