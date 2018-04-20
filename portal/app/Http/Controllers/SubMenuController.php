<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\SubMenu;
class SubMenuController extends Controller
{
     public function index(){

    }
    public function showSubMenuForm(){
        $menus = Menu::all();
    	return view('admin.sub-menu.add-sub-menu',['menus'=>$menus]);
    }
    public function storeSubMenuInfo(Request $request){
    	$subMenu = new SubMenu ();
        $subMenu->name = $request->name;
    	$subMenu->menu_id = $request->menu_id;
    	$subMenu->status = $request->status;
    	$subMenu->save();
    	return redirect('/admin/add-sub-menu')->with('success','Sub-Menu Save Successfully !!');
    }
   
}
