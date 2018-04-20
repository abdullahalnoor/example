<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LucumLanguage;
use Auth;

class LucumLanguageController extends Controller
{
    public function index(){
        $currentLucum = Auth::guard('web')->user();
    	$lucumLanguage = LucumLanguage::where('lucum_id',$currentLucum->id)->get();
    	return view('user.profile.spoken-language.index',compact('lucumLanguage'));
    }
    public function create(){    	
    	return view('user.profile.spoken-language.add-language');	
    }
    public function store(Request $request){
    	$this->validate($request,[
            'name'=>'required',
        ]);
    	$lucumLanguage = new LucumLanguage();
    	$lucumLanguage->lucum_id = Auth::user()->id;
    	$lucumLanguage->name = $request->name;
    	$lucumLanguage->save();
    	return redirect('lucum/language');
    }
}
