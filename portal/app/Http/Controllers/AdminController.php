<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PracticeForm;

class AdminController extends Controller
{
    public function index(){
    	return view('admin.home.index');
    }
    public function allPractices(){
    	$practices = PracticeForm::orderBy('id','desc')->get();
    	return view('admin.practice.practice-list',[
    		'practices'=>$practices,
    	]);
    }
    public function practiceDetailInfo($id){
    	$practice = PracticeForm::find($id);
    	return view('admin.practice.practice-detail',[
    		'practice'=>$practice,
    	]);
    }
    public function allLucums(){
    	$lucums = User::orderBy('id','desc')->get();
    	return view('admin.lucum.lucum-list',[
    		'lucums'=>$lucums,
    	]);
    }
    public function lucumDetailInfo($id){
    	$lucum = User::find($id);
    	return view('admin.lucum.lucum-detail',[
    		'lucum'=>$lucum,
    	]);
    }
}
