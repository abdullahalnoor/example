<?php

namespace App\Http\Controllers;

use App\AppliedPracticeJob;
use App\JobSession;
use App\LucumDocument;
use App\LucumExperience;
use App\LucumItSystem;
use App\LucumLanguage;
use App\LucumQualification;
use App\User;
use Auth;
use Chumper\Zipper\Facades\Zipper;
use Chumper\Zipper\make;
use Illuminate\Http\Request;
use ZanySoft\Zip\Zip;

class DoctorProfileController extends Controller
{
    public function index(){
    	if ($practice = Auth::guard('practice')->user()) {

    		$practiceJobs = JobSession::where('practice_id',$practice->id)->pluck('id');
    		$applicants = AppliedPracticeJob::whereIn('job_id',$practiceJobs)->where('recruit',1)->pluck('applicant_id')->unique();
    			$lucums = User::whereIn('id',$applicants)->get();
    		
			return view('practice.my-doctor.my-doctor',[
    		'lucums'=>$lucums,
    	]);

    	}
    	
    }
    public function viewDoctorProfileInfo($id){
    	$lucum = User::where('id',$id)->first();
    	$lucumDocument = LucumDocument::where('lucum_id',$id)->get();
    	$lucumItSystem = LucumItSystem::where('lucum_id',$id)->get();
    	$lucumQualification = LucumQualification::where('lucum_id',$id)->get();
    	$lucumExperience = LucumExperience::where('lucum_id',$id)->get();
    	$lucumLanguage = LucumLanguage::where('lucum_id',$id)->get();
    	// dd($lucumExperience);LucumDocument
    	return view('practice.my-doctor.doctor-profile',[
    		'lucum'=>$lucum,
    		'lucumDocument'=>$lucumDocument,
    		'lucumItSystem'=>$lucumItSystem,
    		'lucumQualification'=>$lucumQualification,
    		'lucumExperience'=>$lucumExperience,
    		'lucumLanguage'=>$lucumLanguage
    	]);
    }

    public function allDocumentDownload($id){
       $documents = LucumDocument::where('lucum_id',$id)->pluck('document')->toArray();
       //  $files = glob('lucum-document/*');
       // $path = 'lucum-document-zip/';
       $zip = Zipper::make('lucum-document-zip/documents.zip')->add($documents)->close();
       // $zip->remove('lucum-document-zip/documents.zip');

         return response()->download('lucum-document-zip/documents.zip');
    }
}
