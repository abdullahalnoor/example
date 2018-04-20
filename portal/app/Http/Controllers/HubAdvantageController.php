<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HubAdvantage;

class HubAdvantageController extends Controller
{
    public function showHubAdvantageForm(){
        return view('admin.page-hubs.hub-advantage.add-hub-advantage');
    }
    public function storeHubAdvantageInfo(Request $request){
        // return $request->all();
        $hubAdvantage = new HubAdvantage();
        $hubAdvantage->title = $request->title;
        $hubAdvantage->description = $request->description;
        $hubAdvantage->status = $request->status;
        $hubAdvantage->save();
        return redirect('admin/add-hub-advantage-info')->with('success','Hub Advantage Info Added Successfully !!');
    }
}
