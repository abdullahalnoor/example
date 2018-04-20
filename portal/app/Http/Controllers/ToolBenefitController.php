<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToolBenefit;

class ToolBenefitController extends Controller
{
    public function showToolBenefitForm(){
    	return view('admin.page-lucums.tool-benefit.add-benefit-info');
    }
    public function storeToolBenefitInfo(Request $request){
    	// return $request->all();
        $icon = $request->file('icon');
        $iconName = $icon->getClientOriginalName();
        $iconDirectory = "icon-images/";
        $icon->move($iconDirectory,$iconName);
        $iconUrl = $iconDirectory.$iconName;
    	$toolBenefit = new ToolBenefit();
    	$toolBenefit->icon = $iconUrl;
        $toolBenefit->description = $request->description;
    	$toolBenefit->status = $request->status;
    	$toolBenefit->save();
    	return redirect('admin/add-benefit-info')->with('success','Benefit Info Added Successfully !!');
    }
}
