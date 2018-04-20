<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SessionInfo;

class SessionInfoController extends Controller
{
    public function store(Request $request){
    	
    
    	return redirect('practice/priority-access-info/'.$sessionInfo->id);
    }

    public function editJobSessionInfo($id){
       
    }

  

   
}
