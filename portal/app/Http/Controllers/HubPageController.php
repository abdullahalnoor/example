<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HubAdvantage;
use App\HubFacility;
use App\HubSpeech;

class HubPageController extends Controller
{
    public function home(){
		$hubAdvantage = HubAdvantage::orderBy('id','desc')->take(6)->get();
		$hubFacility = HubFacility::orderBy('id','desc')->take(3)->get();
        $hubSpeech = HubSpeech::orderBy('id','desc')->take(1)->first();
    	return view('front.hub.hub',[
    		'hubAdvantage'=>$hubAdvantage,
    		'hubFacility'=>$hubFacility,
            'hubSpeech'=>$hubSpeech,
    	]);
    }
}
