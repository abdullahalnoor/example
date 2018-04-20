<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PracticeCCG;

class PracticeCcgFormController extends Controller
{
    public function showPracticeCcgForm(){
    	return view('front.form.practice-ccg-form');
    }
    public function storePracticeCcgInfo(Request $request){
    		$practiceCcg = new PracticeCCG();
    		$practiceCcg->name = $request->name;
    		$practiceCcg->save();
    		return redirect('/practice-ccg-form');
    }
}
