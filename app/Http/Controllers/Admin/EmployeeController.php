<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use Carbon\Carbon;
use Image;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Add(){     
        return view('admin.employee.index');
    }

    // --------------------- store employee ---------------------- 
    public function Store(Request $request){
        $request->validate([
            'employee_name' => 'required|unique:employees,employee_name',
            'position' => 'required|',
            'facebook' => 'required|',
            'twitter' => 'required|',
            'instagram' => 'required|',
            'image' => 'required|mimes:jpg,jpeg,png,gif'
        ],[
            'facebook.required' => 'facebook link is required',
            'twitter.required' => 'twitter link is required',
            'instagram.unique' => 'instagram link is required',
            'image.required' => 'select employee image',
        ]);

        $image = $request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('fontend/image/employee/'.$name_gen);
        $save_url = 'fontend/image/employee/'.$name_gen;
       $insert = Employee::insert([
        'employee_name' => $request->employee_name,
        'position' => $request->position,
        'image' => $save_url,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'instagram' => $request->instagram,
        'created_at' => Carbon::now()
       ]);
        $notification=array(
            'message'=>'Employee Added Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('admin.manage.employee')->with($notification);
    }


    // ================== manage employee ------------------ 
    public function Manage(){
        $employees = Employee::all();
        return view('admin.employee.manage',compact('employees'));
    }
    // --------------------------- edit data  ----------------------- 
    public function edit($id){
        $employee = Employee::findOrFail($id);
        return view('admin.employee.edit',compact('employee'));
    }

    // ==================== update employee ================== 
    public function Update(Request $request,$id){
        if($request->file('image')){
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif'
            ],[
                'image.required' => 'select employee image',
            ]);
            
            $old_img = $request->old_image;
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('fontend/image/employee/'.$name_gen);
            $save_url = 'fontend/image/employee/'.$name_gen;
            unlink($old_img);
            $insert = Employee::findOrFail($id)->update([
                'employee_name' => $request->employee_name,
                'position' => $request->position,
                'image' => $save_url,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'updated_at' => Carbon::now()
            ]);
                $notification=array(
                    'message'=>'Employee Update Success',
                    'alert-type'=>'success'
                );
                return Redirect()->route('admin.manage.employee')->with($notification);
        }else{
            $insert = Employee::findOrFail($id)->update([
                'employee_name' => $request->employee_name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'updated_at' => Carbon::now()
            ]);
                $notification=array(
                    'message'=>'Employee Update Success',
                    'alert-type'=>'success'
                );
                return Redirect()->route('admin.manage.employee')->with($notification);
        }
    }

      
    // ======================= Delete employee ===================== 
    public function delete($id){
        $employee = Employee::findOrFail($id);
        $img = $employee->image;
        unlink($img);
        Employee::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Employee Deleted Successfully ',
            'alert-type'=>'success'
           );
         return Redirect()->back()->with($notification);
    }

    // ====================== Inactive  ================== 
    public function Inactive($id){

        Employee::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification=array(
            'message'=>'Employee Data Inactive',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }

    // ====================== active ================== 
    public function Active($id){

        Employee::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification=array(
            'message'=>'Employee Data Activated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }



}
