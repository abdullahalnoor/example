<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
use Auth;

class CvController extends Controller
{	
	
	public function showCvForm(){
	if (Auth::guard('web')->user()) {
    		return view('user.my-cv.add-cv');
		}
    }

    public function storeCvInfo(Request $request){
		if ($usrId = Auth::guard('web')->user()) {
			//return $request->all();
			 $cvFile = $request->file('file_name');
		       $fileName = $cvFile->getClientOriginalName();
		       $fileDirectory ='upload-cv/';
		       $cvFile->move($fileDirectory,$fileName);
		       $fileUrl = $fileDirectory.$fileName;
	    		$cvInfo = new Cv();
				$id	= $usrId->id;
		    	$cvInfo->user_id = $id;
		    	$cvInfo->career_summary = $request->career_summary;
		    	$cvInfo->skill = $request->skill;
		    	$cvInfo->educational_info = $request->educational_info;
		    	$cvInfo->personal_info = $request->personal_info;
		    	$cvInfo->file_name = $fileUrl;
		    	$cvInfo->save();
	    	
	    	return redirect('user-cv/cv-form');
	    }
    }
    public function showCvUploadForm(){
    	return view('user.my-cv.upload-cv');
    }



	 
}
