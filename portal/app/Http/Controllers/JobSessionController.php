<?php

namespace App\Http\Controllers;

use App\SessionInfo;
use App\JobSession;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Auth;

class JobSessionController extends Controller
{
    public function index(){
      session()->has('billableHours')?session()->forget('billableHours'):'';
      session()->has('billableMinute')?session()->forget('billableMinute'):'';
      session()->has('total')?session()->forget('total'):'';
    	return view('practice.job-session.add-session');
    }
    public function storeJobSession(Request $request){
      // return $request->all();
        $this->validate($request,[
          'start_date'=>'required|date',
          'start_time'=>'required',
          'end_time'=>'required',
          'unpaid_break_hr'=>'nullable',
          'unpaid_break_min'=>'nullable',
          'hourly_rate'=>'required',
          'repeat_date'=>'required_with:saturday,sunday,monday,tuesday,wednesday,thursday,friday',
        ]);
        Session::put('addSession',$request->all());
        // $addSession = Session::get('addSession');
        // dd($addSession);
        $startTime = Carbon::parse($request->start_time);
        $endTime = Carbon::parse($request->end_time);
        $billableHours = $endTime->diffInHours($startTime);
        $durationInMin = $endTime->diffInMinutes($startTime);
        $billableMinute = $durationInMin % 60;
        Session::flash('billableHours',$billableHours);
        Session::flash('billableMinute',$billableMinute);
        // dd($durationInHr);
        $hrPerMin = $billableHours * 60 ;
        $totalMin = $hrPerMin + $billableMinute;
        $costPerMin = 80 / 60 ;
        $totalCostInMin = $totalMin * $costPerMin;

        $lantumFee = 60;
        $subTotal = $totalCostInMin + $lantumFee ;
        $vat = (12 / 100) * $subTotal;
        $total = $subTotal - $vat ;
        Session::flash('total',$total);

        return redirect('practice/view-job-session');
    }


    public function viewJobSession(){
        return view('practice.job-session.view-session');
    }
    public function viewJobSessionInfo(){
           Session::forget('billableHours');
            Session::forget('billableMinute');
            Session::forget('total');

        return view('practice.job-session.view-session-info');
    }
    public function storeJobSessionInfo(Request $request){

      $this->validate($request,[
        'doctor'=>'required',
        'nurse'=>'required',
        'time'=>'required',
        'slot'=>'required',
        'title'=>'required',
        'description'=>'required',
      ]);

       Session::put('sessionInfo',$request->all());
       return redirect('practice/view-job-session-priority-access');
    }
    public function viewPriorityAccess(){
        return view('practice.job-session.priority-access-info');
    }
    public function  storePriorityAccess(Request $request){
        // return $request->all();
        Session::put('priorityAccess',$request->all());
        // dd(Session::get('priority'));
       return redirect('practice/view-job-session-review-publish');
    }
    public function viewReviewPublish(){
        return view('practice.job-session.review-session-info');
    }
    public function store(Request $request){
       $jobSession =  new JobSession();
       // $sessionInfo =  new SessionInfo();

       $addSession = Session::get('addSession');
       // dd($addSession);
       $getSessionInfo = Session::get('sessionInfo');
       // dd($getSessionInfo);
       $priorityAccess = Session::get('priorityAccess');
        // dd($priorityAccess);
        $user = Auth::guard('practice')->user();
        $id= $user->id;
        // dd($id);
        
       $jobSession->practice_id = $id;
       $jobSession->start_date = $addSession['start_date'];
       $jobSession->start_time = $addSession['start_time'];
       $jobSession->end_time = $addSession['end_time'];
       $jobSession->unpaid_break_hr = $addSession['unpaid_break_hr'];
       $jobSession->unpaid_break_min = $addSession['unpaid_break_min'];
       $jobSession->hourly_rate = $addSession['hourly_rate'];
       $jobSession->saturday =array_key_exists('saturday', $addSession)? $addSession['saturday']:null;
       $jobSession->sunday =array_key_exists('sunday', $addSession)? $addSession['sunday']:null;
       $jobSession->monday =array_key_exists('monday', $addSession)? $addSession['monday']:null;
       $jobSession->tuesday = array_key_exists('tuesday', $addSession)?$addSession['tuesday']:null;
       $jobSession->wednesday = array_key_exists('wednesday', $addSession)?$addSession['wednesday']:null;
       $jobSession->thursday = array_key_exists('thursday', $addSession)?$addSession['thursday']:null;
       $jobSession->friday = array_key_exists('friday', $addSession)?$addSession['friday']:null;
       $jobSession->number_of_session = array_key_exists('number_of_session', $addSession)?$addSession['number_of_session']:null;
       $jobSession->repeat_date = $addSession['repeat_date'];
       $jobSession->doctor = $getSessionInfo['doctor'];
       $jobSession->nurse = $getSessionInfo['nurse'];
       $jobSession->time = $getSessionInfo['time'];
       $jobSession->slot = $getSessionInfo['slot'];

       $jobSession->home =array_key_exists('home', $getSessionInfo)?$getSessionInfo['home']:null;
       $jobSession->telephone =array_key_exists('telephone', $getSessionInfo)?$getSessionInfo['telephone']:null;
       $jobSession->description =array_key_exists('description', $getSessionInfo)?$getSessionInfo['description']:null;
       $jobSession->title = $getSessionInfo['title'];
       $jobSession->description = $getSessionInfo['description'];
       $jobSession->priority = array_key_exists('priority', $priorityAccess)?$priorityAccess['priority']:null;

       $jobSession->status = $request->status;
       $jobSession->save();

       $request->session()->forget('addSession');
       $request->session()->forget('sessionInfo');
       $request->session()->forget('priorityAccess');
      Session::forget('billableHours');
      Session::forget('billableMinute');
      Session::forget('total');


       return redirect('practice/my-job-detail/'.$jobSession->id)->with('success','Your Job Session Info Added Successfully...');


    }

  
  


}
