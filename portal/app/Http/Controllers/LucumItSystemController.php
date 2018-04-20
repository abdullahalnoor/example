<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LucumItSystem;
use Auth;

class LucumItSystemController extends Controller
{
    public function index(){
        $currentLucum = Auth::guard('web')->user();
    	$lucumItSystem =  LucumItSystem::Where('lucum_id',$currentLucum->id)->get();
    	return view('user.profile.my-it-system.index',[
    		'lucumItSystem'=>$lucumItSystem,
    	]);
    }
    public function create(){
    	return view('user.profile.my-it-system.add-it-system');	
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'name'=>'required',
    	]);
    	$lucumItSystem = new LucumItSystem();
    	$lucumItSystem->lucum_id = Auth::user()->id;
    	$lucumItSystem->name = $request->name;
    	$lucumItSystem->save();
    	return redirect('lucum/it-system');
    }
}
