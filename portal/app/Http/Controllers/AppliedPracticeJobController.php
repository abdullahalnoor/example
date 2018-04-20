<?php

namespace App\Http\Controllers;

use App\AppliedPracticeJob;
use App\JobSession;
use App\Notifications\NotifyAppliedPracticeJob;
use App\PracticeForm;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Mail;

class AppliedPracticeJobController extends Controller
{
    public function applyJob($id){
    	//check login to apply job
    	if ($user = Auth::guard('web')->user()) {
    		// dd($user);
    		// check if he/she already applied for this job
    	$appliedJob	= AppliedPracticeJob::where('job_id',$id)->where('applicant_id',$user->id)->first();
    		if ($appliedJob){
    			return redirect()->back()->with('success','You Have Already Applied for this Job before '.$appliedJob->created_at->diffforhumans());
    		}else{
    		// check if he/she already not applied for this job
    			//check if he/she upload cv
                $jobSession = JobSession::find($id);
    			$practiceJob = new AppliedPracticeJob();
    			$practiceJob->job_id		= $id;
    			$practiceJob->applicant_id   = Auth::user()->id;
                $practiceJob->applicant_name =  Auth::user()->first_name;
    			$practiceJob->job_title =  $jobSession->title;
    			$practiceJob->save();
    			// dd($practiceJob);
    			$jobSession = JobSession::where('id',$practiceJob->job_id)->first();
    			$practice = PracticeForm::where('id',$jobSession->practice_id)->first();
    			$practice->notify(new NotifyAppliedPracticeJob($practiceJob));
    			$user->notify(new NotifyAppliedPracticeJob($practiceJob));



    			$practice = $practice->toArray();
    			$user 	  = $user->toArray();
    			
    			Mail::send('mail.lucum-confirmation-mail',$user,function($message) use($user){
    				$message->to('elpic-20413d@inbox.mailtrap.io');
    				$message->from($user['email']);
    				$message->subject('Congratulation Mail');
    			});
    			Mail::send('mail.practice-confirmation-mail',$practice,function($message) use($practice){
    					$message->to('elpic-20413d@inbox.mailtrap.io');
    					$message->from($practice['email']);
    					$message->subject('Congratulation Mail');
    			});

    			return redirect('home');
    		}
    	}else{
    		//check login to apply job
    		return redirect('login')->with('success','If You Want Apply This Job You Must be Logged In First ');
    	}
    }
}
