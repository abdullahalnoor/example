<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\LucumQualification;

class LucumQualificationController extends Controller
{
    public function index(){
        $currentLucum = Auth::guard('web')->user();
    	$lucumQual =  LucumQualification::where('lucum_id',$currentLucum->id)->get();
    	return view('user.profile.my-qualification.index',[
    		'lucumQual'=>$lucumQual,
    	]);
    }
    public function create(){
    	return view('user.profile.my-qualification.add-qualification');	
    }
    public function store(Request $request){

    	$this->validate($request,[
    		'name'=>'required',
    		'instiitute_name'=>'required',
    		'start_date'=>'required',
    		'end_date'=>'required',
    	]);

    	$lucumQual = new LucumQualification();
    	$lucumQual->lucum_id = Auth::user()->id;
    	$lucumQual->name = $request->name;
    	$lucumQual->instiitute_name = $request->instiitute_name;
    	$lucumQual->start_date = $request->start_date;
    	$lucumQual->end_date = $request->end_date;
    	$lucumQual->save();
    	return redirect('lucum/qualification');
    }
}
