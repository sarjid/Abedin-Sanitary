<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Headline as ModelHeadline;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Model\Headline;
class HeadlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // --------------- index page ------------- 
    public function index(){
        $headline = ModelHeadline::findOrFail(1);
        return view('admin.headline.index',compact('headline'));
    }

    // ------------- update headline -------------- 
    public function update(Request $request){
        ModelHeadline::findOrFail(1)->update([
            'notice' => $request->notice,
            'created_at' => Carbon::now()
        ]);
        $notification=array(
            'message'=>'Update Done',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function deactive(){
        ModelHeadline::findOrFail(1)->update([
            'status' => 1,
        ]);
        $notification=array(
            'message'=>'Headline Deactivate',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function active(){
        ModelHeadline::findOrFail(1)->update([
            'status' => 0,
        ]);
        $notification=array(
            'message'=>'Headline Activate',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
