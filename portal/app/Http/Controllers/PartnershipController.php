<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partnership;

class PartnershipController extends Controller
{
     public function showPartnershipForm(){
    	return view('admin.page-lucums.partnership.add-partnership');
    }
    public function storePartnershipInfo(Request $request){
    	// return $request->all();
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imageDirectory = "partnership-images/";
        $image->move($imageDirectory,$imageName);
        $imageUrl = $imageDirectory.$imageName;
    	$partnership = new Partnership();
    	$partnership->image = $imageUrl;
        $partnership->url = $request->url;
    	$partnership->status = $request->status;
    	$partnership->save();
    	return redirect('admin/add-partnership-info')->with('success','Partnership Info Added Successfully !!');
    }
}
