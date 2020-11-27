<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Delar;
use App\Model\Delarservice;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Employee;
use App\Model\Service;
use App\Model\Customerreview;
use App\Model\About;
use App\Model\Contact;
use App\Model\Message;
use Carbon\Carbon;



class PagesController extends Controller
{
    // =============== Home page ============== 
    public function index(){
        $categories = Category::latest()->where('status',1)->get();
        $products = Product::latest()->where('status',1)->limit(36)->get();
        $cat_products = Product::latest()->where('status',1)->limit(24)->get();
        $main_sliders = Product::latest()->where('status',1)->where('main_slider',1)->limit(3)->get();
        $employees = Employee::where('status',1)->get();
        $services = Service::where('status',1)->get();
        $reviews = Customerreview::latest()->where('status',1)->get();
        return view('pages.index',compact('categories','products','cat_products','main_sliders','employees','services','reviews'));
    }

    // --------------------- about page ---------------------------- 
    public function AboutPage(){
        $products_slide = Product::latest()->where('status',1)->limit(3)->get();
        $more_products = Product::latest()->where('status',1)->get();
        $about = About::findOrFail(1);
        return view('pages.about-us',compact('products_slide','more_products','about'));
    }

    // ------------------------- product page ----------------- 
    public function ProductPage(){
        $products = Product::latest()->where('status',1)->paginate(24);
        $count = Product::latest()->where('status',1)->get();
        $categories = Category::latest()->where('status',1)->get();
        $subcategories = Subcategory::latest()->where('status',1)->get();
        $delars = Delar::latest()->where('status',1)->get();
        $delar_services = Delarservice::latest()->where('status',1)->get();
        return view('pages.our-products',compact('products','count','categories','subcategories','delars',
    'delar_services'));       
    }

    // category wise product show 
    public function CatWiseProduct($category_id,$slug){
        $products = Product::latest()->where('category_id',$category_id)->where('status',1)->paginate(24);
        $count = Product::where('category_id',$category_id)->where('status',1)->get();
        $categories = Category::latest()->where('status',1)->get();
        $subcategories = Subcategory::latest()->where('status',1)->get();
        $delars = Delar::latest()->where('status',1)->get();
        $delar_services = Delarservice::latest()->where('status',1)->get();
        return view('pages.cat-products',compact('products','count','categories','subcategories','delars','slug','delar_services'));
    } 
    
    // Delar wise product show 
    public function DelarWiseProduct($delar_id,$slug){
        $products = Product::latest()->where('company_id',$delar_id)->where('status',1)->paginate(24);
        $count = Product::where('company_id',$delar_id)->where('status',1)->get();
        $categories = Category::latest()->where('status',1)->get();
        $subcategories = Subcategory::latest()->where('status',1)->get();
        $delars = Delar::latest()->where('status',1)->get();
        $delar_services = Delarservice::latest()->where('status',1)->get();
        return view('pages.delar-products',compact('products','count','categories','subcategories','delars','delar_services','slug'));
    }
    // ==================== subcategory by products ================
    public function SubCatProduct($subcat_id,$slug){    
        $products = Product::latest()->where('subcategory_id',$subcat_id)->where('status',1)->paginate(24);
        $count = Product::where('subcategory_id',$subcat_id)->where('status',1)->get();
        $categories = Category::latest()->where('status',1)->get();
        $subcategories = Subcategory::latest()->where('status',1)->get();
        $delars = Delar::latest()->where('status',1)->get();
        $delar_services = Delarservice::latest()->where('status',1)->get();
        return view('pages.subcat-products',compact('products','count','categories','subcategories','delars','delar_services','slug'));
    }
//  ----------------------- delar products -------------------------------- 
    public function DelarCompanyProducts($service_id,$slug){
        $products = Product::latest()->where('service_id',$service_id)->where('status',1)->paginate(24);
        $count = Product::where('service_id',$service_id)->where('status',1)->get();
        $categories = Category::latest()->where('status',1)->get();
        $subcategories = Subcategory::latest()->where('status',1)->get();
        $delars = Delar::latest()->where('status',1)->get();
        $delar_services = Delarservice::latest()->where('status',1)->get();
        return view('pages.delar-service-products',compact('products','count','categories','subcategories','delars','delar_services','slug','service_id'));
    }

    // ================================================= contact page ===================================== 
    public function ContactPage(){
        $contact = Contact::findOrFail(1);
        return view('pages.contact-page',compact('contact'));
    }

    // --------------------- contact message send -------------
    public function ContactMsg(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|min:11',
            'message' => 'required|string|max:255',
            'subject' => 'max:255',

        ],[
            'name.required' => 'আপনার নাম লিখুন',
            'email.required' => 'আপনার ইমেইল ঠিকানা প্রবেশ করুন',
            'phone.required' => 'আপনার মোবাইল নাম্বার লিখুন ',
            'phone.min' => 'আপনার মোবাইল নাম্বার ১১ সংখ্যার হতে হবে',
            'message.required' => 'আপনার বার্তা লিখুন',
        ]);
           
       $insert = Message::insert([
        'name' => $request->name,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'email' => $request->email,
        'message' => $request->message,
        'created_at' => Carbon::now()
       ]);

       if ($insert) {
        $notification=array(
            'message'=>'আপনার বার্তা পাঠানো হয়েছে',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

       }    
    }
}