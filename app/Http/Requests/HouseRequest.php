<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseRequest extends FormRequest
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
            'house_name' => 'required | unique:houses'
        ];
    }

    public function messages(){

         return [
            'house_name.required' => 'House name is required',
            'house_name.unique'   => 'This house is already exist',
        ];
    }
}
