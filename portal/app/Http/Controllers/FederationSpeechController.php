<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FederationSpeech;

class FederationSpeechController extends Controller
{
    public function showFederationSppeechForm(){
        return view('admin.page-federation.federation-speech.add-federation-sppeech');
    }
    public function storeFederationSppeechInfo(Request $request){
        // return $request->all();
        $federation = new FederationSpeech();
        $federation->name = $request->name;
        $federation->description = $request->description;
        $federation->status = $request->status;
        $federation->save();
        return redirect('admin/add-federation-speech-info')->with('success','Federation Sppech Info Added Successfully !!');
    }
}
