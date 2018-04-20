<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HubFacility;

class HubFacilityController extends Controller
{
    public function showHubFacilityForm(){
    	return view('admin.page-hubs.hub-facility.add-hub-facility');
    }
    public function storeHubFacilityInfo(Request $request){
    	// return $request->all();
        $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconDirectory = "icon-images/";
        $icon->move($iconDirectory,$iconName);
        $iconUrl = $iconDirectory.$iconName;
    	$hubFacility = new HubFacility();
    	$hubFacility->icon = $iconUrl;
        $hubFacility->description = $request->description;
    	$hubFacility->status = $request->status;
    	$hubFacility->save();
    	return redirect('admin/add-hub-facility-info')->with('success','Huub Facility Info Added Successfully !!');
    }
}
