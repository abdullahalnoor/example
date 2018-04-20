<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){

    }
    public function showMenuForm(){
    	return view('admin.menu.add-menu');
    }
    public function storeMenuInfo(Request $request){
    	$menu = new Menu ();
    	$menu->name = $request->name;
    	$menu->status = $request->status;
    	$menu->save();
    	return redirect('/admin/add-menu')->with('success','Menu Save Successfully !!');
    }
}
