<?php

namespace App\Http\Controllers;

use App\JobSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\PracticeForm;


class JobSessionManageController extends Controller
{
     public function index(){
        if (Session::has('addSession')) {
             Session::forget('addSession');
            // Session::forget('billableHours');
            // Session::forget('billableMinute');
            // Session::forget('total');

        }
      $user = Auth::guard('practice')->user();
    	$jobSession = JobSession::where('practice_id',$user->id)->get();
    	return view('practice.job-session.my-job',compact('jobSession'));
    }
    public function myJobDetail($id){
    	$jobSession = JobSession::find($id);

    	$startTime = Carbon::parse($jobSession->start_time);
    	$endTime   = Carbon::parse($jobSession->end_time);
    	$diffInHours  = $endTime->diffInHours($startTime);
    	$diffInMinutes = $startTime->diffInMinutes($endTime);
    	$duration = $diffInMinutes % 60 ;
    	// dd($duration);
    	$breakHour = $jobSession->unpaid_break_hr;
    	$breakMinute = $jobSession->unpaid_break_min;

    	$workingHour = $diffInHours - $breakHour;
    	$workingMinute = $duration - $breakMinute;
    	$workingInMinutes = $workingHour * 60 ;
    	$totalWorkingMinute = $workingInMinutes - $workingMinute;
    	$minutes = $totalWorkingMinute % 60 ;
    	$hours = $totalWorkingMinute / 60 ;

    	$workingTimeInMinutes = $workingInMinutes + $minutes ; //total working time in minute as a one session
    	$hourlyRate =  $jobSession->hourly_rate; // hourly rate
    	$costPerMin =  $hourlyRate / 60; //cost per minute
    	$sessionCostGP = $workingTimeInMinutes * $costPerMin;// cost per session

    	$lantumFee = 60 ;
    	$sessionCost = $sessionCostGP + $lantumFee ;
    	$vat = (12/100) * $sessionCost;

    	$sessionPerCost = $sessionCost + $vat; 
        $totalCost = (float)$sessionPerCost * (float)$jobSession->number_of_session;
    	 // dd(floor($total));


    	return view('practice.job-session.my-job-detail',[
    		'jobSession'=>$jobSession,
    		'minutes'=>$minutes,
    		'hours'=>$hours,
            'sessionPerCost'=>$sessionPerCost,
    		'totalCost'=>$totalCost,
    	]);
    }
    public function publishedMyJob($id){
    	$jobSession = JobSession::find($id);
    	$jobSession->status = 1;
    	$jobSession->save();
    	return redirect('practice/my-job')->with('success','Your Job Status Published Successfully !!');
    }
    public function unpublishedMyJob($id){
    	$jobSession = JobSession::find($id);
    	$jobSession->status = 0;
    	$jobSession->save();
    	return redirect('practice/my-job')->with('success','Your Job Status Unpublished Successfully !!');
    }
    public function deleteMyJob($id){
    	$jobSession = JobSession::find($id);
    	$jobSession->delete();
    	return redirect('practice/my-job')->with('success','Your Job Info Deleted  Successfully !!');
    }
    public function editSession($id){

        $jobSession = JobSession::find($id);
        Session::put('id',$jobSession->id);
        return view('practice.job-session.edit-session',[
            'jobSession'=>$jobSession,
        ]);
    }
    public function showEditSession(){
        return view('practice.job-session.edit-view-session');
    }
    public  function updateJobSession(Request $request){
          $this->validate($request,[
          'start_date'=>'required|date',
          'start_time'=>'required',
          'end_time'=>'required',
          'unpaid_break_hr'=>'nullable',
          'unpaid_break_min'=>'nullable',
          'hourly_rate'=>'required',
          'repeat_date'=>'required_with:saturday,sunday,monday,tuesday,wednesday,thursday,friday',
        ]);

        Session::put('updateSession',$request->all());
        // $addSession = Session::get('addSession');
        // dd($addSession);
        $startTime = Carbon::parse($request->start_time);
        $endTime = Carbon::parse($request->end_time);
        $billableHours = $endTime->diffInHours($startTime);
        $durationInMin = $endTime->diffInMinutes($startTime);
        $billableMinute = $durationInMin % 60;
        Session::put('billableHours',$billableHours);
        Session::put('billableMinute',$billableMinute);
        // dd($durationInHr);
        $hrPerMin = $billableHours * 60 ;
        $totalMin = $hrPerMin + $billableMinute;
        $costPerMin = 80 / 60 ;
        $totalCostInMin = $totalMin * $costPerMin;

        $lantumFee = 60;
        $subTotal = $totalCostInMin + $lantumFee ;
        $vat = (12 / 100) * $subTotal;
        $total = $subTotal - $vat ;
        // dd($total);
        Session::put('total',$total);
        return redirect('practice/edit-view-job-session');
    }
    public function showEditSessionView(){
        $jobSession = JobSession::find(Session::get('id'));
        return view('practice.job-session.edit-view-session-info',[
            'jobSession'=>$jobSession,
        ]);
    }
    public function storeEditSessionView(Request $request){
         $this->validate($request,[
        'doctor'=>'required',
        'nurse'=>'required',
        'time'=>'required',
        'slot'=>'required',
        'title'=>'required',
        'description'=>'required',
      ]);

        Session::put('updateSessionInfo',$request->all());
        return redirect('practice/edit-job-session-priority-access');
    }
    public function showEditPriorityAccess(){
        return view('practice.job-session.edit-priority-access-info');

    }
    public function storeEditPriorityAccess(Request $request){
        Session::put('updatePriorityAccess',$request->all());
        return redirect('practice/edit-review-publish');
    }
    public function showEditReviewPublishForm(){
        return view('practice.job-session.edit-review-session-info');
    }

    public function updateSession(Request $request){
               $jobSession =  JobSession::find(Session::get('id'));
       // $sessionInfo =  new SessionInfo();

       $updateSession = Session::get('updateSession');
       // dd($addSession);
       $updateSessionInfo = Session::get('updateSessionInfo');
       // dd($updateSessionInfo);
       $updatePriorityAccess = Session::get('updatePriorityAccess');
        // dd($updatePriorityAccess);
       
       $jobSession->start_date = $updateSession['start_date'];
       $jobSession->start_time = $updateSession['start_time'];
       $jobSession->end_time = $updateSession['end_time'];
       $jobSession->unpaid_break_hr = $updateSession['unpaid_break_hr'];
       $jobSession->unpaid_break_min = $updateSession['unpaid_break_min'];
       $jobSession->hourly_rate = $updateSession['hourly_rate'];
       $jobSession->saturday =array_key_exists('saturday', $updateSession)? $updateSession['saturday']:null;
       $jobSession->sunday =array_key_exists('sunday', $updateSession)? $updateSession['sunday']:null;
       $jobSession->monday =array_key_exists('monday', $updateSession)? $updateSession['monday']:null;
       $jobSession->tuesday = array_key_exists('tuesday', $updateSession)?$updateSession['tuesday']:null;
       $jobSession->wednesday = array_key_exists('wednesday', $updateSession)?$updateSession['wednesday']:null;
       $jobSession->thursday = array_key_exists('thursday', $updateSession)?$updateSession['thursday']:null;
       $jobSession->friday = array_key_exists('friday', $updateSession)?$updateSession['friday']:null;
       $jobSession->number_of_session = array_key_exists('number_of_session', $updateSession)?$updateSession['number_of_session']:null;
       $jobSession->repeat_date = $updateSession['repeat_date'];
       $jobSession->doctor = $updateSessionInfo['doctor'];
       $jobSession->nurse = $updateSessionInfo['nurse'];
       $jobSession->time = $updateSessionInfo['time'];
       $jobSession->slot = $updateSessionInfo['slot'];

       $jobSession->home =array_key_exists('home', $updateSessionInfo)?$updateSessionInfo['home']:null;
       $jobSession->telephone =array_key_exists('telephone', $updateSessionInfo)?$updateSessionInfo['telephone']:null;
       $jobSession->description =array_key_exists('description', $updateSessionInfo)?$updateSessionInfo['description']:null;
       $jobSession->title = $updateSessionInfo['title'];
       $jobSession->description = $updateSessionInfo['description'];
       $jobSession->priority = array_key_exists('priority', $updatePriorityAccess)?$updatePriorityAccess['priority']:null;

       $jobSession->status = $request->status;
       $jobSession->save();

       $request->session()->forget('updateSession');
       $request->session()->forget('updateSessionInfo');
       $request->session()->forget('updatePriorityAccess');

       return redirect('practice/my-job-detail/'.$jobSession->id)->with('success','Your Job Session Info Updated Successfully...');
    }


}
