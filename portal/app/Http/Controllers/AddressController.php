<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class AddressController extends Controller
{
    public function showAddressForm(){
    	return view('admin.footer.address.add-address');
    }
    public function storeAddressInfo(Request $request){
    	$address = new Address();
    	$address->floor_number = $request->floor_number;
    	$address->street_number = $request->street_number;
    	$address->city = $request->city;
    	$address->country = $request->country;
    	$address->phone = $request->phone;
    	$address->email = $request->email;
    	$address->status = $request->status;
    	$address->save();
    	return redirect('admin/add-address')->with('success','Address Info Added Successfully !!');
    }
}
