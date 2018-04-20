<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PracticeManager;


class PracticeManagerController extends Controller
{
    public function index(){
    	$practiceManager = PracticeManager::orderBY('id','desc')->paginate(10);
    	return view('admin.page-practices.practice-manager.view-practice-manager-info',[
    		'practiceManager'=>$practiceManager
    	]);

	}
    public function showNetworkPracticeManegerForm(){
    	return view('admin.page-practices.practice-manager.add-practice-manager');
    }
    public function storeNetworkPracticeManegerInfo(Request $request){
    	 $imageFile = $request->file('image');
    	 $fileName = $imageFile->getClientOriginalName();
    	 $fileDirectory = "upload-image/";
    	 $imageFile->move($fileDirectory,$fileName);
    	 $fileUrl = $fileDirectory.$fileName;

	     $practiceManager	= new PracticeManager();
	     $practiceManager->name = $request->name;
	     $practiceManager->address = $request->address;
	     $practiceManager->country = $request->country;
	     $practiceManager->city = $request->city;
	     $practiceManager->speech = $request->speech;
	     $practiceManager->image = $fileUrl;
	     $practiceManager->status = $request->status;
	     $practiceManager->save();
	     return redirect('admin/add-practice-maneger-info')->with('success','Practice Maneger Added Successfully ');
    }
    public function editPracticeManegerInfo($id){
    	// dd($Id);
    	$practiceManager = PracticeManager::find($id);
    	return view('admin.page-practices.practice-manager.edit-practice-manager',[
    		'practiceManager'=>$practiceManager
    	]);
    }
    public function updatePracticeManegerInfo(Request $request){
    	 $imageFile = $request->file('image');
    	 $fileName = $imageFile->getClientOriginalName();
    	 $fileDirectory = "upload-image/";
    	 $imageFile->move($fileDirectory,$fileName);
    	 $fileUrl = $fileDirectory.$fileName;
    	 
    	$practiceManager = PracticeManager::find($request->id);
	     $practiceManager->name = $request->name;
	     $practiceManager->address = $request->address;
	     $practiceManager->country = $request->country;
	     $practiceManager->city = $request->city;
	     $practiceManager->speech = $request->speech;
	     $practiceManager->image = $fileUrl;
	     $practiceManager->status = $request->status;
	     $practiceManager->save();
	     return redirect('admin/add-practice-maneger-info')->with('success','Practice Maneger Added Successfully ');
    }
}
