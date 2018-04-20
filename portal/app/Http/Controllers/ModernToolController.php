<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModernTool;

class ModernToolController extends Controller
{
    public function index(){
        return view('admin.page-lucums.modern-tool.view-tool-info');
    }
    public function showToolForm(){
    	return view('admin.page-lucums.modern-tool.add-tool-info');
    }
    public function storeToolInfo(Request $request){
    	// return $request->all();
    	$modernTool = new ModernTool();
    	$modernTool->title = $request->title;
        $modernTool->description = $request->description;
    	$modernTool->status = $request->status;
    	$modernTool->save();
    	return redirect('admin/add-tool-info')->with('success','Tool Info Added Successfully !!');
    }
}
