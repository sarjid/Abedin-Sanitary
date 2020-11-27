<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Message;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
// ============== Show index page ====================== 
    public function ContactPage(){
        $messages = Message::latest()->where('status',1)->get();
        return view('admin.message.index',compact('messages'));
    }


    // ===================== view message ============= 
    public function ShowMsg($id){
        $msg = Message::findOrFail($id);
        Message::findOrFail($id)->update(['status' => 0]);
        return view('admin.message.view',compact('msg'));
    }


    // ============== Show index page ====================== 
    public function Trash(){
        $messages = Message::latest()->where('status',0)->get();
        return view('admin.message.trash',compact('messages'));
    }

     // ========= delete ====================
     public function Delete($id){
          
        Message::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Delete Done',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
