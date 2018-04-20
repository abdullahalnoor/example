<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NetworkBenefit;

class NetworkBenefitController extends Controller
{
    public function showNetworkBenefitForm(){
    	return view('admin.page-practices.network-benefit.add-benefit-info');
    }
    public function storeNetworkBenefitInfo(Request $request){
    	// return $request->all();
        $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconDirectory = "icon-images/";
        $icon->move($iconDirectory,$iconName);
        $iconUrl = $iconDirectory.$iconName;
    	$networkBenefit = new NetworkBenefit();
    	$networkBenefit->icon = $iconUrl;
        $networkBenefit->description = $request->description;
    	$networkBenefit->status = $request->status;
    	$networkBenefit->save();
    	return redirect('admin/add-network-benefit-info')->with('success','Network Benefit Info Added Successfully !!');
    }
}
