<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutMenu;

class AboutMenuController extends Controller
{
     public function showAboutMenuForm(){
    	return view('admin.footer.about-menu.add-about-menu');
    }
    public function storeAboutMenuInfo(Request $request){
    	// return $request->all();
    	$aboutMenu = new AboutMenu();
    	$aboutMenu->name = $request->name;
        $aboutMenu->url = $request->url;
    	$aboutMenu->status = $request->status;
    	$aboutMenu->save();
    	return redirect('admin/add-about-menu')->with('success','About Menu Info Added Successfully !!');
    }
}
