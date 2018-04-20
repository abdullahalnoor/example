<?php

namespace App\Http\Controllers;

use App\AppliedPracticeJob;
use App\JobSession;
use App\PracticeForm;
use App\User;
use App\LucumDocument;
use App\LucumExperience;
use App\LucumItSystem;
use App\LucumLanguage;
use App\LucumQualification;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\markAsRead;
use Illuminate\Notifications\unreadNotifications;

class LucumApplicantController extends Controller
{
    public function viewJobApplicant($id){
    	if (Auth::guard('practice')->user()) {
    		$jobs = AppliedPracticeJob::where('job_id',$id)->get();
    		// dd($jobs);
    		return view('practice.job-applicant.applicant-list',[
    			'jobs'=>$jobs
    		]);
    	}
    }
    public function recruitLucumApplication($id,$jobId){
    		$accept = AppliedPracticeJob::find($id);
    		// dd($accept);
    		$accept->recruit = 1;
    		$accept->save();
    		return redirect('practice/job-applicant/'.$jobId)->with('success','Application Accepted..');
    }
    public function cancelLucumApplication($id,$jobId){
    	$accept = AppliedPracticeJob::find($id);
    		$accept->recruit = null;
    		$accept->save();
    		return redirect('practice/job-applicant/'.$jobId)->with('success','Application Rejected..');
    }

    public function viewApplicantProfile($id,$jobId=null){
    	$lucum = User::find($id);
        $lucumDocument = LucumDocument::where('lucum_id',$id)->get();
        $lucumItSystem = LucumItSystem::where('lucum_id',$id)->get();
        $lucumQualification = LucumQualification::where('lucum_id',$id)->get();
        $lucumExperience = LucumExperience::where('lucum_id',$id)->get();
        $lucumLanguage = LucumLanguage::where('lucum_id',$id)->get();

    	if ($jobId) {
    		$appliedJobId = AppliedPracticeJob::findOrFail($jobId);
	        $practiceId = JobSession::findOrFail($appliedJobId->job_id);
	        // dd($practiceId->practice_id);

	    	$practice = PracticeForm::find($practiceId->practice_id);
	        $practice->unreadNotifications->markAsRead();
    	}
    	return view('practice.job-applicant.applicant-profile',[
    			'lucum'=>$lucum,
                'lucumDocument'=>$lucumDocument,
                'lucumItSystem'=>$lucumItSystem,
                'lucumQualification'=>$lucumQualification,
                'lucumExperience'=>$lucumExperience,
                'lucumLanguage'=>$lucumLanguage
    		]);
    }




}
