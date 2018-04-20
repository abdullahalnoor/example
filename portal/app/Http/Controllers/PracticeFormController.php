<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PracticeCCG;
use App\PracticeItSystemm;
use App\PracticeForm;
use App\PracticeItSystemItem;
use Session;
use Mail;

class PracticeFormController extends Controller
{
    public function showPracticeForm(){
    		$practiceCcgs = PracticeCCG::get();
    		$practiceItSystemms = PracticeItSystemm::get();
    		//dd($practiceCcgs);
    	return view('front.form.practice-form',[
    		'practiceCcgs'=>$practiceCcgs,
    		'practiceItSystemms'=>$practiceItSystemms,
    	]);
    }

    public function storePracticeFormInfo(Request $request){
    	//return $request->all();
        $this->validate($request,[
            'practice_name'=>'required',
            'practice_code'=>'required',
            'practice_postcode'=>'required',
            'phone_number'=>'required',
            'ccg_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'payment_type'=>'required',
        ]);
    	$practiceFormInfo = new  PracticeForm();
    	$practiceFormInfo->practice_name = $request->practice_name;
    	$practiceFormInfo->practice_code = $request->practice_code;
    	$practiceFormInfo->practice_postcode = $request->practice_postcode;
    	$practiceFormInfo->phone_number = $request->phone_number;
    	$practiceFormInfo->ccg_id = $request->ccg_id;
    	$practiceFormInfo->first_name = $request->first_name;
    	$practiceFormInfo->last_name = $request->last_name;
    	$practiceFormInfo->email = $request->email;
    	$practiceFormInfo->password = bcrypt($request->password);
    	$practiceFormInfo->payment_type = $request->payment_type;
    	$practiceFormInfo->save();

    	$practiceFormId =   $practiceFormInfo->id;

    	$systemAllId = $request->it_system_id;

    	foreach ($systemAllId as  $systemId) {
    		//dd($systemId);
    		$PracticeItSystemItem = new PracticeItSystemItem();

    		$PracticeItSystemItem->practice_form_id = $practiceFormId;
    		$PracticeItSystemItem->it_system_id = $systemId;
    		$PracticeItSystemItem->save();

    	}
        //Session::flush;
       

        return redirect('practice/login/form')->with('success','You Have Registered Successfully ');



    }
}
