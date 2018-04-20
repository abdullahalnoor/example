<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feature;

class FeatureController extends Controller
{
    public function showFeatureForm(){
    	return view('admin.page-lucums.feature.add-feature');
    }
    public function storeFeatureInfo(Request $request){
    	// return $request->all();
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imageDirectory = "partnership-images/";
        $image->move($imageDirectory,$imageName);
        $imageUrl = $imageDirectory.$imageName;
    	$feature = new Feature();
    	$feature->image = $imageUrl;
        $feature->url = $request->url;
    	$feature->status = $request->status;
    	$feature->save();
    	return redirect('admin/add-feature-info')->with('success','Feature Info Added Successfully !!');
    }
}
