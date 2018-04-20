<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FederationFacility;

class FederationFacilityController extends Controller
{
    public function showFederationFacilityForm(){
    	return view('admin.page-federation.federation-facility.add-federation-facility');
    }
    public function storeFederationFacilityInfo(Request $request){
    	// return $request->all();
        $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconDirectory = "icon-images/";
        $icon->move($iconDirectory,$iconName);
        $iconUrl = $iconDirectory.$iconName;
    	$federation = new FederationFacility();
    	$federation->icon = $iconUrl;
        $federation->description = $request->description;
    	$federation->status = $request->status;
    	$federation->save();
    	return redirect('admin/add-federation-facility-info')->with('success','Federation Facility Info Added Successfully !!');
    }
}
