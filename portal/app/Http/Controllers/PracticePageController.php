<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\NetworkGP;
use App\NetworkBenefit;
use App\PracticeManager;
use App\PracticePartnership;

class PracticePageController extends Controller
{
    public function home(){
		$networkGPs = NetworkGP::orderBy('id','desc')->take(4)->get();
		$networkBenefits = NetworkBenefit::orderBy('id','desc')->take(4)->get();
        $practiceManagers = PracticeManager::orderBy('id','desc')->take(3)->get();
        $practicePartnerships = PracticePartnership::orderBy('id','desc')->take(4)->get();
		$clients = Client::orderBy('id','desc')->take(8)->get();
    	return view('front.practice.pracitce',[
    		'networkGPs'=>$networkGPs,
    		'networkBenefits'=>$networkBenefits,
            'practiceManagers'=>$practiceManagers,
            'practicePartnerships'=>$practicePartnerships,
    		'clients'=>$clients,
    	]);
    }
}
