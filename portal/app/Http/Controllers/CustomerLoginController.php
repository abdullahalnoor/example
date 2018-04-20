<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegistrationOne;
use App\RegistrationTwo;
use Session;
use DB;

class CustomerLoginController extends Controller
{
     public function showLoginForm(){
    	return view('front.form.login');
    }
    public function customerLogin(Request $request){
    	//return $request->all();
    	 $customer =  DB::table('registration_twos')
                       ->join('registration_ones','registration_ones.id','=','registration_twos.formStepOneId')
                       ->select('registration_twos.password','registration_ones.email','registration_ones.first_name','registration_ones.last_name')
                       ->limit(1)
                       ->first();

    	$customerEmail = RegistrationOne::where('email',$request->email)->first();
    	// $customerPassword =  RegistrationTwo::where('password',$request->password)->first();

         // $customerEmail = $customer->email;
          $customerPassword = $customer->password;
      if ($customerEmail){
          if (password_verify($request->password,$customerPassword)){
              	Session::put('customerFirstName',$customer->first_name);
              	Session::put('customerLasttName',$customer->last_name);
              return redirect('/');
          }else{
          	return redirect('/login-form')->with('messagePassword','Inavlid Password');
          }
      }else{
          	return redirect('/login-form')->with('messageEmail','Inavlid Email');
      }

    }




}
