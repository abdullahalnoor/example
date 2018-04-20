<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LucumMenu;

class LucumMenuController extends Controller
{
     public function showLucumMenuForm(){
    	return view('admin.footer.lucum-menu.add-lucum-menu');
    }
    public function storeLucumMenuInfo(Request $request){
    	// return $request->all();
    	$lucumMenu = new LucumMenu();
        $lucumMenu->name = $request->name;
    	$lucumMenu->url = $request->url;
    	$lucumMenu->status = $request->status;
    	$lucumMenu->save();
    	return redirect('admin/add-lucum-menu')->with('success','Lucum Menu Info Added Successfully !!');
    }
}
