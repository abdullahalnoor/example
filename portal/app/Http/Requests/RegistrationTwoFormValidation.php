<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationTwoFormValidation extends FormRequest
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
            'password'=>'required',
            'gmc_Number'=>'required',
            'address_one'=>'required',
            'address_two'=>'required',
            'city'=>'required',
            'postcode'=>'required',
            'phone_number'=>'required',
            'reference_phone_number'=>'required',
        ];
    }
}
