<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FederationAdvantage;
use App\FederationFacility;
use App\FederationSpeech;
class FederationPageController extends Controller
{
     public function home(){
		$federationAdvantage = FederationAdvantage::orderBy('id','desc')->take(6)->get();
		$federationFacility = FederationFacility::orderBy('id','desc')->take(3)->get();
        $federationSpeech = FederationSpeech::orderBy('id','desc')->take(1)->first();
    	return view('front.federation.federation',[
    		'federationAdvantage'=>$federationAdvantage,
    		'federationFacility'=>$federationFacility,
            'federationSpeech'=>$federationSpeech,
    	]);
    }
}
