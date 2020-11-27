<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Delar;
use App\Model\Delarservice;
use DB;

class SearchController extends Controller
{
    public function Search(Request $request){
        
       $search =  $request->search;
    if ($search !== NUll) {
        
        $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('subcategories','products.subcategory_id','subcategories.id')
            ->join('delars','products.company_id','delars.id')
            ->select('products.*','categories.category_name','subcategories.subcategory_name','delars.company_name')
            ->where('product_name','LIKE',"%{$search}%")
            ->orWhere('short_description','LIKE',"%{$search}%")
            ->orWhere('long_description','LIKE',"%{$search}%")
            ->orWhere('category_name','LIKE',"%{$search}%")
            ->orWhere('subcategory_name','LIKE',"%{$search}%")
            ->orWhere('company_name','LIKE',"%{$search}%")
            ->paginate(24);    

            $categories = Category::latest()->where('status',1)->get();
            $subcategories = Subcategory::latest()->where('status',1)->get();
            $delars = Delar::latest()->where('status',1)->get();
            $delar_services = Delarservice::latest()->where('status',1)->get();   
        return view('pages.search',compact('products','categories','subcategories','delars','delar_services'));  
    }else{
        $notification=array(
            'message'=>'পণ্যের নাম লিখে অনুসন্ধান করুন',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }
  
  
    }
}
