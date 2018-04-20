<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
class ClientController extends Controller
{
    public function showClientForm(){
    	return view('admin.page-practices.client.add-client-ifo');
    }
    public function storeClientInfo(Request $request){
    	// return $request->all();
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imageDirectory = "partnership-images/";
        $image->move($imageDirectory,$imageName);
        $imageUrl = $imageDirectory.$imageName;
    	$client = new Client();
    	$client->image = $imageUrl;
        $client->url = $request->url;
    	$client->status = $request->status;
    	$client->save();
    	return redirect('admin/add-client-info')->with('success','Client Info Added Successfully !!');
    }
}
