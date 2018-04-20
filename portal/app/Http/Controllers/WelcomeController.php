<?php

namespace App\Http\Controllers;

use App\Job;
use App\Menu;
use App\SubMenu;
use App\JobSession;
use Illuminate\Http\Request;


class WelcomeController extends Controller
{
   
     public function allJob(){
        $menus = Menu::all();
        $jobs = Job::where('status',1)->orderBy('id','desc')->get();
        $sessionInfos = JobSession::where('status',1)->orderBy('id','desc')->get();
        return view('front.job.all-job',[
            'jobs'=>$jobs,
            'menus'=>$menus,
            'sessionInfos'=>$sessionInfos,
        ]);
    }
    public function detailJobInfo($id){
        $menus = Menu::all();
        $job = JobSession::where('id',$id)->first();
        return view('front.job.job-detail',['job'=>$job,'menus'=>$menus]);

    }
    
}
