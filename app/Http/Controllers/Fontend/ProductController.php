<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Comment;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function ViewProduct($product_id,$slug){
        $product = Product::findOrFail($product_id);
        $category_id = $product->category_id;
        $related_p = Product::latest()->where('category_id',$category_id)->where('status',1)->where('id','!=',$product_id)->get();
        $comments = Comment::latest()->where('product_id',$product_id)->where('status',1)->get();
        return view('pages.product-details',compact('product','related_p','comments'));
    }

    //------------------------------ store product comment ----------------- 
    public function StoreComment(Request $request){
        $request->validate([
            'star_rating' => 'required',
            'your_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:255',

        ],[
            'star_rating.required' => 'স্টার রেটিং সিলেক্ট করুন',
            'your_name.required' => 'আপনার নাম লিখুন',
            'email.required' => 'আপনার ইমেইল ঠিকানা প্রবেশ করুন',
            'comment.required' => 'আপনার মূল্যবান মতামত লিখুন',
        ]);

       $product_id = $request->product_id;
       $insert = Comment::insert([
        'product_id' => $request->product_id,
        'star_rating' => $request->star_rating,
        'your_name' => $request->your_name,
        'email' => $request->email,
        'comment' => $request->comment,
        'created_at' => Carbon::now()
       ]);

       if ($insert) {
        $notification=array(
            'message'=>'আপনার কমেন্ট সফল হয়েছে',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

       }    
    }
}
