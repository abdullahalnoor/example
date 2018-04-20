<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PracticeItSystemm;

class PracticeItSystemmFormController extends Controller
{
    public function showPracticeItSystemmForm(){
    	return view('front.form.practice-it-system-form');
    }
    public function storePracticeItSystemmInfo(Request $request){
    		$practiceItSystemm = new PracticeItSystemm();
    		$practiceItSystemm->name = $request->name;
    		$practiceItSystemm->save();

    		return redirect('/practice-it-system-form');
    }
}
