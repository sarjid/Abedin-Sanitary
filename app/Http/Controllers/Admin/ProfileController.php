<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;
use Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // user profile

    public function index(){
        return view('admin.profile.index');
    }


    // update

    public function Update(Request $request){
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
        ]);
        $id = Auth::user()->id;
        if ($request->file('image')) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif'
            ]);
            if (Auth::user()->image === 'backend/img/avatar.jpg') {        
                $image = $request->file('image');
                $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('backend/img/profile/'.$name_gen);
                $save_url = 'backend/img/profile/'.$name_gen;
                User::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'image' => $save_url,
                ]);
                $notification=array(
                    'message'=>'Profile Update Success',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }else{
                $old_img = $request->old_image;
                $image = $request->file('image');
                $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('backend/img/profile/'.$name_gen);
                $save_url = 'backend/img/profile/'.$name_gen;
                unlink($old_img);
                User::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'image' => $save_url,
                ]);
                $notification=array(
                    'message'=>'Profile Update Success',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }
        }else{
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $notification=array(
                'message'=>'Profile Update Success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }


    }

    // password

    public function Password(){
        return view('admin.profile.password');
    }


    // update pass
    public function UpdatePassword(Request $request){

        $id = Auth::user()->id;
        $db_pass = Auth::user()->password;
        $old_pass = $request->old_password;
        $new_pass = $request->new_password;
        $confirm_pass = $request->confirm_password;

        if(Hash::check($old_pass, $db_pass)){

            if($new_pass === $confirm_pass){

                User::find($id)->update([
                    'password' => Hash::make($request->new_password)
                ]);
                Auth::logout();
                $notification=array(
                    'message'=>'Password Change Successfully.! Now login With New Password',
                    'alert-type'=>'success'
                );
                return Redirect()->route('login')->with($notification);

            }else{
                return Redirect()->back()->with('danger','new password and confirm passoword not same');
            }

        }else{
            return Redirect()->back()->with('error','old Passowrd Not match');
        }

    }
}
