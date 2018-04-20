<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistrationOne;
use Session;
use App\Http\Requests\RegistrationOneFormValidation;

class RegistrationOneController extends Controller
{
    public function showRegistrationFormOne(){
    	return view('front.form.registration-step-one');
    }
    public function storeRegistrationOneInfo(RegistrationOneFormValidation $request){
    		// $registrationOne = new RegistrationOne();
    		// $registrationOne->email = $request->email;
    		// $registrationOne->first_name = $request->first_name;
    		// $registrationOne->last_name = $request->last_name;
      //       $registrationOne->save();
      //       $customerName = $registrationOne->first_name;
           // Session::put('formStepOneId',$registrationOne->id);
            // $email      = $request->email;
            // $first_name = $request->first_name;
            // $last_name  = $request->last_name;
            Session::put('email',$request->email);
            Session::put('first_name',$request->first_name);
            Session::put('last_name',$request->last_name);
    		return redirect()->route('register');
    }
}
