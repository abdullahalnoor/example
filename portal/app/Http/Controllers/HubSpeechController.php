<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HubSpeech;

class HubSpeechController extends Controller
{
     public function showHubSppeechForm(){
        return view('admin.page-hubs.hub-sppeech.add-hub-sppeech');
    }
    public function storeHubSppeechInfo(Request $request){
        // return $request->all();
        $hubSpeech = new HubSpeech();
        $hubSpeech->name = $request->name;
        $hubSpeech->description = $request->description;
        $hubSpeech->status = $request->status;
        $hubSpeech->save();
        return redirect('admin/add-hub-speech-info')->with('success','Hub Sppech Info Added Successfully !!');
    }
}
