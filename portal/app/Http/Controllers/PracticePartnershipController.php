<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PracticePartnership;
class PracticePartnershipController extends Controller
{
    public function showPracticePartnershipForm(){
    	return view('admin.page-practices.practice-partnership.add-practice-partnership');
    }
    public function storePracticePartnershipInfo(Request $request){
    	// return $request->all();
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imageDirectory = "partnership-images/";
        $image->move($imageDirectory,$imageName);
        $imageUrl = $imageDirectory.$imageName;
    	$practicePartnership = new PracticePartnership();
    	$practicePartnership->image = $imageUrl;
        $practicePartnership->url = $request->url;
    	$practicePartnership->status = $request->status;
    	$practicePartnership->save();
    	return redirect('admin/add-practice-partnership-info')->with('success',' Practice Partnership Info Added Successfully !!');
    }
}
