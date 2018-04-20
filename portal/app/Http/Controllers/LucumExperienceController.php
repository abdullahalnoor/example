<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LucumExperience;
use Auth;

class LucumExperienceController extends Controller
{
	public function index(){
        $currentLucum = Auth::guard('web')->user();
        $lucumExperience =  LucumExperience::where('lucum_id',$currentLucum->id)->orderBy('id','asc')->get();
    	return view('user.profile.my-experience.index',['lucumExperience'=>$lucumExperience]);
	}
    public function create(){
    	return view('user.profile.my-experience.add-experience');
    }
    public function store(Request $request){
        $this->validate($request,[
            'post'=>'required',
            'company_name'=>'required',
            'description'=>'required',
        ]);

    	$lucumExperience = new LucumExperience();
        $lucumExperience->lucum_id = Auth::user()->id;
    	$lucumExperience->post = $request->post;
    	$lucumExperience->company_name = $request->company_name;
    	$lucumExperience->description = $request->description;
    	$lucumExperience->save();
        return redirect('lucum/experience');
    }
}
