<?php

namespace App\Http\Controllers;

use App\AppliedJob;
use App\Job;
use App\Notifications\NotifyAppliedJob;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\markAsRead;
use Illuminate\Notifications\unreadNotifications;
use Notifications;
use App\JobSession;
use App\AppliedPracticeJob;


class UserJobController extends Controller
{
    use Notifiable;
    public function index(){
    	if ($userId = Auth::guard('web')->user()->id) {
    		$appliedJobs	= AppliedJob::where('applicant_id',$userId)->get();
    		return view('user.my-job.job-list',[
                'appliedJobs'=>$appliedJobs,
            ]);
    	}
    }
    public function jobDetailInfo($id,$mark=null){
    	$jobDetail = AppliedJob::find($id);
        $userId = $jobDetail->applicant_id;
        $user = User::find($userId);
        $user->unreadNotifications->markAsRead();
        $jobId = $jobDetail->job_id;
        $job = Job::where('id',$jobId)->first();
    	return view('user.my-job.job-detail',[
            'jobDetail'=>$jobDetail,
            'job'=>$job,
        ]);
    }
    public function practiceJobList(){
        if ($lucum = Auth::guard('web')->user()) {
           $jobs = AppliedPracticeJob::where('applicant_id',$lucum->id)->orderBy('recruit','desc')->get();
           return view('user.my-application.all-application',[
            'jobs'=>$jobs
        ]);
        }
    }
    public function practiceJobDetail($id,$mark=null){
        $jobDetail = AppliedPracticeJob::find($id);
        $userId    = $jobDetail->applicant_id;
        $user = User::find($userId);
        $user->unreadNotifications->markAsRead();
        $jobId = $jobDetail->job_id;
        $jobSession = JobSession::where('id',$jobId)->first();
        return view('user.my-application.application-detail',[
            'jobSession'=>$jobSession
        ]);
    }
    
}
