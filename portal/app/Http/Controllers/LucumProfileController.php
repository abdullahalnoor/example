<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LucumProfile;
use Auth;
use App\User;

class LucumProfileController extends Controller
{
    public function index(){
    	return view('user.profile.profile');
    }
    public function showProfileInfo(){
        $currentLucum = Auth::guard('web')->user();
        $lucumId = $currentLucum->id;
        $user = User::where('id',$lucumId)->first();
    	return view('user.profile.my-profile.index',[
            'user'=>$user
        ]);
    }
    public function create(){
        return view('user.profile.my-profile.add-profile');
    }


    public function storeProfileImage(Request $request){
    	
        $this->validate($request,[
            'image'=>'required',
        ]);

    	 $currentLucum = Auth::guard('web')->user();
    	$lucumId = $currentLucum->id;
    	$lucumProfile =  User::where('id',$lucumId)->first();
    	  
    	        $image = $request->file('image');
    	 	    $imageName = $image->getClientOriginalName();
		        $imageDirectory = "lucum-profile-images/";
		        $image->move($imageDirectory,$imageName);
		        $imageUrl = $imageDirectory.$imageName;
		    	$lucumProfile->image = $imageUrl ;
		    	$lucumProfile->save();
    	 
    	return redirect('lucum/view-profile-info');
    }
}
