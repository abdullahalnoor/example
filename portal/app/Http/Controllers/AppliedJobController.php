<?php

namespace App\Http\Controllers;

use App\AppliedJob;
use App\Job;
use App\Notifications\NotifyAppliedJob;
use App\User;
use App\PracticeForm;
use Auth;
use DB;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Notification;
use App\Cv;

class AppliedJobController extends Controller
{
    public function applyJob($id){
    	if (Auth::guard('web')->user()) {
            if ($serId = Auth::user()->id) {
            $appliedJob = AppliedJob::where('applicant_id',$serId)->where('job_id',$id)->first();
            // dd($appliedJob);
               if ($appliedJob) {
                return redirect()->back()->with('success','You have already Submitted Your Application for this job at '.$appliedJob->created_at->diffforhumans());                               
               }else{
                $cv = Cv::where('user_id',$serId)->get();
               if ($cv->count() > 0) {
                 $job  = Job::find($id);
                $title  = $job->title;
                $appliedJob = new AppliedJob();
                $appliedJob->job_id = $id;
                $appliedJob->job_title = $title;
                $appliedJob->applicant_id = Auth::user()->id;
                $appliedJob->applicant_name = Auth::user()->first_name;
                //dd($appliedJob);

                $appliedJob->save();
                  $id = $appliedJob->id;
                
               if ($id) {
                  $userId = $appliedJob->applicant_id;
                  $job = AppliedJob::find($id);
                   
                   $user = User::find($userId); 
                   $jobId = $job->job_id; 
                   $peacticId = Job::find($jobId);
                   $practiceUserId = $peacticId->practiceUserId;
                   $practce = PracticeForm::find($practiceUserId);
                   
                   $user->notify(new NotifyAppliedJob($job));
                   $practce->notify(new NotifyAppliedJob($job));

                   $user = $user->toArray(); 
                   $practce = $practce->toArray();

                   Mail::send('mail.form',$user, function($message) use($user){
                   $message->to('elpic-20413d@inbox.mailtrap.io'); 
                   $message->from($user['email']);
                   $message->subject('Congratulation Mail');
                           }); 

                   Mail::send('mail.form',$practce,function($message) use($practce){
                   $message->to('elpic-20413d@inbox.mailtrap.io'); 
                   $message->from($practce['email']);
                   $message->subject('Congratulation Mail');
                    }); 
            
               }

                return redirect('user-job/job-detail/'.$appliedJob->id)->with('success','Your Application Submitted Successfully !!');
                } else{
                    return redirect('user-cv/cv-form')->with('success','You Must Upload Your Cv  Before Applying Job. Thanks !!');
                   }            
               }
            }else{
                return "something goning wrong";
            }
    		
    	}else{
    		return redirect()->route('login')->with('success','If You Want Apply This Job You Must be Logged In First ');
    	}
    	

    }
    //for practice whom posted job
    public function appliedJobList(){
    	if ($user = Auth::guard('practice')->user()) {
            $userId = $user->id;
            $jobs = Job::where('practiceUserId',$userId)->get();
            return view('practice.job.applied-job');
        }
    }
    //for practice whom applied job

}
