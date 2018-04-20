<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FederationAdvantage;

class FederationAdvantageController extends Controller
{
    public function showFederationAdvantageForm(){
        return view('admin.page-federation.federation-advantage.add-federation-advantage');
    }
    public function storeFederationAdvantageInfo(Request $request){
        // return $request->all();
        $federation = new FederationAdvantage();
        $federation->title = $request->title;
        $federation->description = $request->description;
        $federation->status = $request->status;
        $federation->save();
        return redirect('admin/add-federation-advantage-info')->with('success','Federation Advantage Info Added Successfully !!');
    }
}
