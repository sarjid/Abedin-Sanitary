<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\About;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
// --------------- index page --------------------- 
    public function index(){
       $about = About::findOrFail(1);
       return view('admin.about-us.index',compact('about'));
    }

     // ==================== update employee ================== 
     public function Update(Request $request){
         
    $request->validate([
        'about_us' => 'required',
        'what_we_do' => 'required',
    ]);
        $update = About::findOrFail(1)->update([
            'about_us' => $request->about_us,
            'what_we_do' => $request->what_we_do,
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
