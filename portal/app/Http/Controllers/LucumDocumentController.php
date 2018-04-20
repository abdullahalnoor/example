<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LucumDocument;
use Auth;

class LucumDocumentController extends Controller
{
    public function index(){
        $currentLocum = Auth::guard('web')->user();
        $lucumDocument = LucumDocument::where('lucum_id',$currentLocum->id)->get();
    	return view('user.profile.my-document.index',[
            'lucumDocument'=>$lucumDocument
        ]);
    }
    public function create(){
    	return view('user.profile.my-document.add-document');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'document'=>'required',
        ]);

    	$document = $request->file('document');
    	$documentName = $document->getClientOriginalName();
    	$documentDirectory = "lucum-document/";
    	$document->move($documentDirectory,$documentName);
    	$documentUrl = $documentDirectory.$documentName;

    	$lucumDocument = new  LucumDocument();
    	$lucumDocument->lucum_id = Auth::user()->id;
    	$lucumDocument->name 	 = $request->name;
    	$lucumDocument->document = $documentUrl;
        
    	$lucumDocument->save();
    	return redirect('lucum/document');
    }

   
}
