<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Customerreview;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // ----------- index pages ----------- 
    public function index(){
        $reviews = Customerreview::latest()->get();
        return view('admin.review.index',compact('reviews'));
    }

    // ------------ store review ------------- 
    public function Store(Request $request){
        $request->validate([
            'customer_name' => 'required|unique:customerreviews,customer_name|max:255',
            'customer_review' => 'required|',
        ]);
       
       $insert = Customerreview::insert([
        'customer_name' => $request->customer_name,
        'customer_review' => $request->customer_review,
        'created_at' => Carbon::now()
       ]);

       if ($insert) {
        $notification=array(
            'message'=>'Successfully Added',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

       }    
    }

    // -------------------------- edit sevice ---------------- 
    public function edit($id){
        $review = Customerreview::findOrFail($id);
        return view('admin.review.edit',compact('review'));
    }

    // ==================== update employee ================== 
    public function Update(Request $request,$id){
    
            $insert = Customerreview::findOrFail($id)->update([
                'customer_name' => $request->customer_name,
                'customer_review' => $request->customer_review,
                'updated_at' => Carbon::now()
            ]);
                $notification=array(
                    'message'=>'Update Success',
                    'alert-type'=>'success'
                );
                return Redirect()->route('admin.review')->with($notification);
       
    }

      
    // ======================= Delete Service ===================== 
    public function delete($id){
        
        Customerreview::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Deleted Successfully ',
            'alert-type'=>'success'
           );
         return Redirect()->back()->with($notification);
    }

    // ====================== Inactive  ================== 
    public function Inactive($id){

        Customerreview::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification=array(
            'message'=>'Status Inactivated',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }

    // ====================== active ================== 
    public function Active($id){

        Customerreview::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification=array(
            'message'=>'Status Activated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
