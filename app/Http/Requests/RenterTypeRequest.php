<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RenterTypeRequest extends FormRequest
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
            'name' => 'required | unique:renter_types'
        ];
    }

    public function messages(){

         return [
            'name.required' => 'Renter type name is required',
            'name.unique' => 'This type is already exist',
        ];
    }
}
