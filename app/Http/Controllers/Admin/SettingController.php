<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Setting;
use App\Model\Seo;
use Carbon\Carbon;
use Image;

class SettingController extends Controller
{public function __construct()
    {
        $this->middleware('auth');
    }
    
    // index page 
    public function index(){
        $setting = Setting::findOrFail(1);
        return view('admin.setting.index',compact('setting'));
    }

    // update data 
    public function Update(Request $request){
        $request->validate([
            'customer_support' => 'required',
            'opening_hour' => 'required',
            'address_english' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required',
            'linkedin_link' => 'required',
        ]);

            if ($request->file('logo')) {
                $request->validate([
                    'logo' => 'mimes:jpg,jpeg,png,gif'
                ]);
                
                $old_image = Setting::findOrFail(1);
                $old_img =  $old_image->logo;

                $image = $request->file('logo');
                $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(204,70)->save('fontend/image/logo/'.$name_gen);
                $save_url = 'fontend/image/logo/'.$name_gen;
                unlink($old_img);
                $update = Setting::findOrFail(1)->update([
                    'logo' => $save_url,
                    'customer_support' => $request->customer_support,
                    'opening_hour' => $request->opening_hour,
                    'address_english' => $request->address_english,
                    'facebook_link' => $request->facebook_link,
                    'twitter_link' => $request->twitter_link,
                    'instagram_link' => $request->instagram_link,
                    'linkedin_link' => $request->linkedin_link,
                    'updated_at' => Carbon::now()
                ]);
                if ($update) {         
                    $notification=array(
                        'message'=>'Update Success',
                        'alert-type'=>'success'
                    );
                    return Redirect()->back()->with($notification);
                }
            
            }else{
                $update = Setting::findOrFail(1)->update([
                    'customer_support' => $request->customer_support,
                    'opening_hour' => $request->opening_hour,
                    'address_english' => $request->address_english,
                    'facebook_link' => $request->facebook_link,
                    'twitter_link' => $request->twitter_link,
                    'instagram_link' => $request->instagram_link,
                    'linkedin_link' => $request->linkedin_link,
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

    // ---------------------------------------- seo setting ----------------- 
    public function SeoPage(){
        $seo = Seo::findOrFail(1);
        return view('admin.setting.seo',compact('seo'));
    }

    // --------------- update seo setting ------------- 
    public function SeoUpdate(Request $request){
        $update = Seo::findOrFail(1)->update([
            'meta_author' => $request->meta_author,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
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
