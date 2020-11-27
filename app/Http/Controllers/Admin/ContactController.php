<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
// ----------------------- index page -------------- 
    public function ContactPage(){

        $contact = Contact::findOrFail(1);
        return view('admin.contact.index',compact('contact'));
    }

    public function Update(Request $request){
    $request->validate([
        'address' => 'required',
        'call' => 'required',
        'email' => 'required',
    ]);
        $update = Contact::findOrFail(1)->update([
            'address' => $request->address,
            'call' => $request->call,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);
        if ($update) {         
            $notification=array(
                'message'=>'Update Success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
