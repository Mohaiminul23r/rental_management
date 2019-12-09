<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanaRequest extends FormRequest
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
            'city_id' => 'required',
            'name'    => 'required | unique:thanas'
        ];
    }

    public function messages(){

         return [
            'city_id.required' => 'Select city name',
            'name.required' => 'Thana name is required',
            'name.unique' => 'Thana already exist',
        ];
    }
}
