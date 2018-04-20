<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NetworkGP;

class NetworkGPController extends Controller
{
     public function shownetworkForm(){
    	return view('admin.page-practices.network-gps.add-network-info');
    }
    public function storenetworkInfo(Request $request){
    	// return $request->all();
    	$networkGP = new NetworkGP();
    	$networkGP->title = $request->title;
        $networkGP->description = $request->description;
    	$networkGP->status = $request->status;
    	$networkGP->save();
    	return redirect('admin/add-network-info')->with('success','Network and GPs Info Added Successfully !!');
    }
}
