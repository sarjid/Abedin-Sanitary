<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Carbon\Carbon;

class RoleController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    // crate admins form
    public function Create(){
        return view('admin.role.create');
    }

    // store data 
    public function Store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);
        if ($request->password === $request->confirm_password) {
            $insert = User::insert([
                'name'  => $request->name,
                'email'  => $request->email,
                'password'  => Hash::make($request->password),              
                'image'  =>  'backend/img/avatar.jpg',
                'category'  => $request->category,
                'delar'  => $request->delar,
                'products'  => $request->products,
                'employee'  => $request->employee,
                'our_service'  => $request->our_service,
                'customer_review'  => $request->customer_review,
                'about_us'  => $request->about_us,
                'contact'  => $request->contact,
                'message'  => $request->message,
                'settings'  => $request->settings,
                'admin_create'  => $request->admin_create,
                'role'  => 2,  
                'created_at'  => Carbon::now(),  
              ]);
                if ($insert) {
                    $notification=array(
                        'message'=>'Successfully Admin Created',
                        'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);                   
                    }  
        }else{
            $request->validate([
                'password' => 'required|confirmed',
            ],[
                'password.confirmed' => 'your password and confirm password does not match',
            ]);
        }
      
    }

    // show all admins 
    public function ShowAll(){
        $show_admins = User::latest()->where('role',2)->get();
        return view('admin.role.all-admin',compact('show_admins'));
    }


    // edit 
    public function Edit($id){
        $admin = User::findOrFail($id);
        return view('admin.role.edit',compact('admin'));
    }

    // update data 

    public function update(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        if ($request->password === $request->confirm_password) {
            $insert = User::findOrFail($id)->update([
                'name'  => $request->name,
                'email'  => $request->email,
                'password'  => Hash::make($request->password),
                'category'  => $request->category,
                'delar'  => $request->delar,
                'products'  => $request->products,
                'employee'  => $request->employee,
                'our_service'  => $request->our_service,
                'customer_review'  => $request->customer_review,
                'about_us'  => $request->about_us,
                'contact'  => $request->contact,
                'message'  => $request->message,
                'settings'  => $request->settings,
                'admin_create'  => $request->admin_create,
                'role'  => 2,
                'updated_at'  => Carbon::now(),  
              ]);
                if ($insert) {
                    $notification=array(
                        'message'=>'Successfully Updated',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('admin-manage')->with($notification);                   
                    }  
        }else{
            $request->validate([
                'password' => 'required|confirmed',
            ],[
                'password.confirmed' => 'your password and confirm password does not match',
            ]);
        }
    }


    // Delete Data 
    public function Delete($id){

        $delete = User::findOrFail($id)->where('role',2)->delete();
        if($delete){
            $notification=array(
                'message'=>'Successfully Deleted',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        }
    }

}


