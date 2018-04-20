<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function showContactForm(){
    	return view('admin.page-lucums.contact.add-contact');
    }
    public function storeContactInfo(Request $request){
    	$contact = new Contact ();
    	$contact->number = $request->number;
    	$contact->email = $request->email;
    	$contact->save();
    	return redirect('admin/add-contact')->with('success','Contact Info Added Successfully !!');
    }
}
