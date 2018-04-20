<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationOneFormValidation extends FormRequest
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
            'email'=>'required:unique:registration_ones,email',
            'first_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'last_name'=>'required|regex:/^[\pL\s\-]+$/u',
        ];
    }
    public function messages(){
        return [
            'email.required' =>'Email field is required !',
            'email.unique' =>'Email already exist !',
            'first_name.required' =>'First Name field is required !',
            'first_name.regex' =>'First Name must contains only character!',
            'last_name.required' =>'Last Name field is required !',
            'last_name.regex' =>'Last Name field must contains only character !',
        ];
    }
}
