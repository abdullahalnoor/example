<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PracticeMenu;

class PracticeMenuController extends Controller
{
     public function showPracticeMenuForm(){
    	return view('admin.footer.practice-menu.add-practice-menu');
    }
    public function storePracticeMenuInfo(Request $request){
    	// return $request->all();
    	$practiceMenu = new PracticeMenu();
        $practiceMenu->name = $request->name;
    	$practiceMenu->url = $request->url;
    	$practiceMenu->status = $request->status;
    	$practiceMenu->save();
    	return redirect('admin/add-practice-menu')->with('success','Practice Menu Info Added Successfully !!');
    }
}
