<?php

namespace App\Http\Controllers;

use App\AppliedJob;
use App\Cv;
use App\Job;
use App\PracticeForm;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Notifications\markAsRead;
use Illuminate\Notifications\unreadNotifications;

class JobController extends Controller
{
    
    
    public function index(){
        if ($user = Auth::guard('practice')->user()) {
            $userId = $user->id;
            $jobs = Job::where('practiceUserId',$userId)->get();
            
        }
    	return view('practice.job.job-list',['jobs'=>$jobs]);
    }
    public function showJobForm(){
    	return view('practice.job.job-form');
    }
    public function storeNewJob(Request $request){
         if ( $user = Auth::guard('practice')->user()) {
            $job = new Job();
            $job->practiceUserId = $user->id;
            $job->title  = $request->title;
            $job->name  = $request->name;
            $job->url  = $request->url;
            $job->address  = $request->address;
            $job->description  = $request->description;
            $job->save();

        }    	
    	return redirect('/post-job')->with('success','Your Post is Submitted ');
    }
    public function unpublishJobStatus($id){
        $publishedJob = Job::find($id);
        $publishedJob->status  = 0;
        $publishedJob->save();
        return redirect('/job')->with('success','Your Post Unpublished Successfully !! ');
    }

    public function publishJobStatus($id){
        $unpublisheJob = Job::find($id);
        $unpublisheJob->status = 1;
        $unpublisheJob->save();
        return redirect('/job')->with('success','Your Post Published Successfully !! ');
    }

    public function viewJobDetail($id){
        if($practice = Auth::guard('practice')->user()){
            $jobById = Job::find($id);
            return view('practice.job.job-detail',[
                'jobById'=>$jobById
            ]);

        }
    }

    public function showEditJobForm($id){
        if ($practice = Auth::guard('practice')->user()) {
            $jobById  = Job::find($id);
           return view('practice.job.job-edit-form',[
            'job'=>$jobById
           ]);
        }
           
    }

    public function updateJobInfo(Request $request){
        //return $request->all();
         if (Auth::guard('practice')->user()) {
            $job  = Job::find($request->jobId);
            $job->title  = $request->title;
            $job->name  = $request->name;
            $job->url  = $request->url;
            $job->address  = $request->address;
            $job->description  = $request->description;
            $job->save();                     
        }
         return redirect('/job')->with('success','Your Post Update Successfully !! ');
    }
    public function deleteJobInfo($id){
        if(Auth::guard('practice')->user()){
            $jobById = Job::find($id);
            $jobById->delete();
            return redirect('/job')->with('success','Your Post Delete Successfully !! ');
        }
    }

    public function appliedJobInfo($id){
        if (Auth::guard('practice')->user()) {
            $applicants = AppliedJob::where('job_id',$id)->get();
            
        }
        return view('practice.job.applied-job',['applicants'=>$applicants]);
    }
    public function applicantCvInfo($id){
        if (Auth::guard('practice')->user()) {
            $cvInfo = Cv::where('user_id',$id)->first();
            return view('practice.job.cv-detail',['cvInfo'=>$cvInfo]);
        }
    }
    public function readNotification($id,$jobId){
        $appliedJob  = AppliedJob::where('id',$id)->where('job_id',$jobId)->first();
        $applicantId = $appliedJob->applicant_id;
        $cvInfo = Cv::find($applicantId);

        //$jobId = $appliedJob->job_id;
        $job = Job::find($jobId);
        $practiceId= $job->practiceUserId;
        $practice = PracticeForm::find($practiceId);
        $practice->unreadNotifications->markAsRead();

     return view('practice.job.cv-detail',['cvInfo'=>$cvInfo]);
    }









}
