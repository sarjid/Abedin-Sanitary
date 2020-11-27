<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Service;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // ----------- index pages ----------- 
    public function index(){
        $services = Service::all();
        return view('admin.service.index',compact('services'));
    }

    // ------------ store services ------------- 
    public function Store(Request $request){
        $request->validate([
            'service_name' => 'required|unique:services,service_name|max:255',
            'service_details' => 'required|',
        ]);
       
       $insert = Service::insert([
        'service_name' => $request->service_name,
        'service_details' => $request->service_details,
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
        $service = Service::findOrFail($id);
        return view('admin.service.edit',compact('service'));
    }

    // ==================== update employee ================== 
    public function Update(Request $request,$id){
    
            $insert = Service::findOrFail($id)->update([
                'service_name' => $request->service_name,
                'service_details' => $request->service_details,
                'updated_at' => Carbon::now()
            ]);
                $notification=array(
                    'message'=>'Service Update Success',
                    'alert-type'=>'success'
                );
                return Redirect()->route('admin.services')->with($notification);
       
    }

      
    // ======================= Delete Service ===================== 
    public function delete($id){
        
        Service::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Deleted Successfully ',
            'alert-type'=>'success'
           );
         return Redirect()->back()->with($notification);
    }

    // ====================== Inactive  ================== 
    public function Inactive($id){

        Service::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification=array(
            'message'=>'Service Inactivated',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }

    // ====================== active ================== 
    public function Active($id){

        Service::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification=array(
            'message'=>'Service Activated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
