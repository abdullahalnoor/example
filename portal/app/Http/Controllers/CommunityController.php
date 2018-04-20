<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;

class CommunityController extends Controller
{	
	public function index(){
		$community = Community::orderBy('id','desc')->paginate(10);
		// dd($community);
    	return view('admin.page-lucums.community.view-community',[
    		'community'=>$community
    	]);
	}
    public function showCommunityForm(){
    	return view('admin.page-lucums.community.add-community');
    }
    public function storeCommunityInfo(Request $request){
    	 $imageFile = $request->file('image');
    	 $fileName = $imageFile->getClientOriginalName();
    	 $fileDirectory = "upload-image/";
    	 $imageFile->move($fileDirectory,$fileName);
    	 $fileUrl = $fileDirectory.$fileName;

	     $community	= new Community();
	     $community->name = $request->name;
	     $community->address = $request->address;
	     $community->country = $request->country;
	     $community->city = $request->city;
	     $community->speech = $request->speech;
	     $community->image = $fileUrl;
	     $community->status = $request->status;
	     $community->save();
	     return redirect('admin/add-community')->with('success','Member Added Successfully ');
    }
    public function viewCommunityDetail($id){
    		$communityDetail = Community::find($id);
    	return view('admin.page-lucums.community.view-community-detail',[
    		'communityDetail'=>$communityDetail
    	]);
    }
    public function editCommunityInfo($id){
    		$community = Community::find($id);
    	return view('admin.page-lucums.community.edit-community',[
    		'community'=>$community
    	]);
    }
    public function updateCommunityInfo(Request $request){
    	 $imageFile = $request->file('image');
    	 $fileName = $imageFile->getClientOriginalName();
    	 $fileDirectory = "upload-image/";
    	 $imageFile->move($fileDirectory,$fileName);
    	 $fileUrl = $fileDirectory.$fileName;

	     $community	=  Community::find($request->id);
	     $community->name = $request->name;
	     $community->address = $request->address;
	     $community->country = $request->country;
	     $community->city = $request->city;
	     $community->speech = $request->speech;
	     $community->image = $fileUrl;
	     $community->status = $request->status;
	     $community->save();
	     return redirect('admin/view-community-detail/'.$community->id)->with('success','Member Info Updated Successfully... ');
    }
}
