<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvancePaymentRequest extends FormRequest
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
            'renter_id'       => 'required',    
            'shop_id'         => 'required',    
            'complex_id'      => 'required',    
            'payment_amount'  => 'required',    
            'date_of_payment' => 'required',
            'status'          => 'required',
        ];
    }

    public function messages(){

         return [
            'renter_id.required'      => 'Select renter name',
            'shop_id.required'        => 'Select shop name',
            'complex_id.required'     => 'Select complex name',
            'payment_amount.required' => 'Enter payment amount',
            'date_of_payment.required'=> 'Select payment date',
            'status.required'         => 'Select payment status',
        ];
    }
}
