<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Community;
use App\ToolBenefit;
use App\ModernTool;
use App\Partnership;
use App\Feature;

class LucumPageController extends Controller
{	
	public function home(){
		$communities = Community::orderBy('id','desc')->take(3)->get();
		$modernTools = ModernTool::orderBy('id','desc')->take(4)->get();
        $toolBenefits = ToolBenefit::orderBy('id','desc')->take(4)->get();
        $partnerships = Partnership::orderBy('id','desc')->take(4)->get();
		$features = Feature::orderBy('id','desc')->take(8)->get();
    	return view('front.home.index',[
    		'communities'=>$communities,
    		'modernTools'=>$modernTools,
            'toolBenefits'=>$toolBenefits,
            'partnerships'=>$partnerships,
    		'features'=>$features,
    	]);
    }
}
