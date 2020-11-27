<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Delar;
use App\Model\Delarservice;
use App\Model\Category;
use App\Model\Subcategory;
use App\Model\Comment;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ------------------- products add ----------------- 
    public function Add(){
        $categories = Category::latest()->where('status',1)->get();
        $delars = Delar::latest()->where('status',1)->get();
        return view('admin.products.add',compact('categories','delars'));
    }

     // get subcategory name with ajax 
     public function GetSubCat($cat_id){   
        $subcat = Subcategory::where('category_id',$cat_id)->where('status',1)->latest()->get();
        return json_encode($subcat);
    }
    // get company service id by ajax 
    public function GetCompId($comp_id){
        $compservice = Delarservice::where('company_id',$comp_id)->where('status',1)->latest()->get();
        return json_encode($compservice);
    }

    // store products 
    public function Store(Request $request){  
        if ($request->company_id) {
            $request->validate([
                'product_name' => 'required|unique:products,product_name',
                'category_id' => 'required',
                'subcategory_id' => 'required',     
                'company_id' => 'required',
                'service_id' => 'required',               
                'short_description' => 'required',
                'long_description' => 'required',
                'image_one' => 'required|mimes:jpg,jpeg,png,gif',
                'image_two' => 'required|mimes:jpg,jpeg,png,gif',
                'image_three' => 'required|mimes:jpg,jpeg,png,gif',
            ],
            [             
                'category_id.required' => 'Please Select Category Name',
                'subcategory_id.required' => 'Please Select Sub Category Name',
                'company_id.required' => 'Please Select Delar Company Name',
                'service_id.required' => 'Please Select Delar Product Name',
                'image_one.required' => 'Select Product Main Thambnail Image',
                'image_two.required' => 'Select Product Second Image',
                'image_three.required' => 'Select Product Third Image',
            ]);
    
                $image_one = $request->file('image_one');
                $image_two = $request->file('image_two');
                $image_three = $request->file('image_three');
    
                $img_name_gen_one = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(600,600)->save('fontend/image/products/'.$img_name_gen_one);
                $img_one= 'fontend/image/products/'.$img_name_gen_one;
    
                $img_name_gen_two = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(600,600)->save('fontend/image/products/'.$img_name_gen_two);
                $img_two= 'fontend/image/products/'.$img_name_gen_two;
    
                $img_name_gen_three = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(600,600)->save('fontend/image/products/'.$img_name_gen_three);
                $img_three= 'fontend/image/products/'.$img_name_gen_three;
    
            $insert = Product::insert([
                'product_name' => $request->product_name,
                'product_slug' => str_replace(' ','-', $request->product_name),
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'company_id' => $request->company_id,
                'service_id' => $request->service_id,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'image_one' => $img_one,
                'image_two' => $img_two,
                'image_three' => $img_three,
                'main_slider' => $request->main_slider,
                'created_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Product Upload Success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
           
        }else {
            $request->validate([
                'product_name' => 'required|unique:products,product_name',
                'category_id' => 'required',
                'subcategory_id' => 'required',         
                'short_description' => 'required',
                'long_description' => 'required',
                'image_one' => 'required|mimes:jpg,jpeg,png,gif',
                'image_two' => 'required|mimes:jpg,jpeg,png,gif',
                'image_three' => 'required|mimes:jpg,jpeg,png,gif',
                ],
                [        
                'category_id.required' => 'Please Select Category Name',
                'image_one.required' => 'Select Product Main Thambnail Image',
                'image_two.required' => 'Select Product Second Image',
                'image_three.required' => 'Select Product Third Image',
                ]);
    
                $image_one = $request->file('image_one');
                $image_two = $request->file('image_two');
                $image_three = $request->file('image_three');
    
                $img_name_gen_one = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(600,600)->save('fontend/image/products/'.$img_name_gen_one);
                $img_one= 'fontend/image/products/'.$img_name_gen_one;
    
                $img_name_gen_two = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(600,600)->save('fontend/image/products/'.$img_name_gen_two);
                $img_two= 'fontend/image/products/'.$img_name_gen_two;
    
                $img_name_gen_three = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(600,600)->save('fontend/image/products/'.$img_name_gen_three);
                $img_three= 'fontend/image/products/'.$img_name_gen_three;
    
            $insert = Product::insert([
                'product_name' => $request->product_name,
                'product_slug' => strtolower(str_replace(' ','-', $request->product_name)),
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'company_id' => $request->company_id,
                'service_id' => $request->service_id,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'image_one' => $img_one,
                'image_two' => $img_two,
                'image_three' => $img_three,
                'main_slider' => $request->main_slider,
                'created_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Product Upload Success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
            
        }


    }

    // ======================== Manage products or all products list show page =========================
    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('admin.products.manage-product',compact('products'));

    }


    // ================================= view products ==============================
    public function ViewProducts($product_id,$slug){
        $product = Product::findOrFail($product_id);
        return view('admin.products.view',compact('product'));
    }

    // ================================= Edit products ==============================
    public function EditProducts($product_id,$slug){
        $product = Product::findOrFail($product_id);
        $cat_id = $product->category_id;
        $comp_id = $product->company_id;
        $categories = Category::latest()->where('status',1)->get();
        $subcategories = Subcategory::latest()->where('category_id',$cat_id)->where('status',1)->get();
        $delars = Delar::latest()->where('status',1)->get();
        $delar_services = Delarservice::latest()->where('company_id',$comp_id)->where('status',1)->get();

        return view('admin.products.edit',compact('product','categories','subcategories','delars','delar_services'));
    }

       // ================================= update products without image ==============================

       public function WithoutImgUpdt(Request $request,$product_id){
             
       $update = Product::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'product_slug' => str_replace(' ','-', $request->product_name),
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'company_id' => $request->company_id,
            'service_id' => $request->service_id,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'main_slider' => $request->main_slider,
            'updated_at' => Carbon::now()
       ]);
       $notification=array(
           'message'=>'Products Updated Success',
           'alert-type'=>'success'
       );
       return Redirect()->route('admin.manage.products')->with($notification);
       }

       // update image 
    public function UpdateImg(Request $request,$product_id){  
        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        $old_One = $request->old_one;
        $old_two = $request->old_two;
        $old_three = $request->old_three;

        // all image update
        if ($request->has('image_one') && $request->has('image_two') && $request->has('image_three') ) {
 
           unlink($old_One);
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(600,600)->save('fontend/image/products/'.$image_one_name);
            $img_one_url = 'fontend/image/products/'.$image_one_name;
            Product::findOrFail($product_id)->update([
                'image_one' => $img_one_url,
            ]);
           
          
            unlink($old_two);
            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(600,600)->save('fontend/image/products/'.$image_two_name);
            $img_two_url = 'fontend/image/products/'.$image_two_name;
            Product::findOrFail($product_id)->update([           
                'image_two' => $img_two_url              
            ]);

           
            unlink($old_three);
            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(600,600)->save('fontend/image/products/'.$image_three_name);
            $img_three_url = 'fontend/image/products/'.$image_three_name;
            Product::findOrFail($product_id)->update([
                'image_three' => $img_three_url
            ]);
            $notification=array(
                'message'=>'Product All Image Updated Successfully ',
                'alert-type'=>'success'
               );
            return Redirect()->route('admin.manage.products')->with($notification);

        }
    
        // image One and two updated
        if ($request->has('image_one') && $request->has('image_two')) {
            unlink($old_One);
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(600,600)->save('fontend/image/products/'.$image_one_name);
            $img_one_url = 'fontend/image/products/'.$image_one_name;
            Product::findOrFail($product_id)->update([
                'image_one' => $img_one_url,
            ]);
 
            unlink($old_two);
            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(600,600)->save('fontend/image/products/'.$image_two_name);
            $img_two_url = 'fontend/image/products/'.$image_two_name;
            Product::findOrFail($product_id)->update([           
                'image_two' => $img_two_url              
            ]);

            $notification=array(
                'message'=>'Image One And Two Updated Successfully ',
                'alert-type'=>'success'
               );
            return Redirect()->route('admin.manage.products')->with($notification);


        }

        // image two and three update

        if ($request->has('image_two') && $request->has('image_three')) {
            unlink($old_two);
            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(600,600)->save('fontend/image/products/'.$image_two_name);
            $img_two_url = 'fontend/image/products/'.$image_two_name;
            Product::findOrFail($product_id)->update([           
                'image_two' => $img_two_url              
            ]);

            unlink($old_three);
            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(600,600)->save('fontend/image/products/'.$image_three_name);
            $img_three_url = 'fontend/image/products/'.$image_three_name;
            Product::findOrFail($product_id)->update([
                'image_three' => $img_three_url
            ]);
            $notification=array(
                'message'=>'Product Image Two & Three Updated Successfully ',
                'alert-type'=>'success'
               );
             return Redirect()->route('admin.manage.products')->with($notification);
        }

       // image one and image three update
        if ($request->has('image_one') && $request->has('image_two') ) {
            unlink($old_One);
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(600,600)->save('fontend/image/products/'.$image_one_name);
            $img_one_url = 'fontend/image/products/'.$image_one_name;
            Product::findOrFail($product_id)->update([
                'image_one' => $img_one_url,
            ]);

            unlink($old_two);
            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(600,600)->save('fontend/image/products/'.$image_two_name);
            $img_two_url = 'fontend/image/products/'.$image_two_name;
            Product::findOrFail($product_id)->update([           
                'image_two' => $img_two_url              
            ]);
            $notification=array(
                'message'=>'Image One & Three Updated Successfully ',
                'alert-type'=>'success'
               );
               return Redirect()->route('admin.manage.products')->with($notification);
        }
        //Image One updated
        if ($request->has('image_one')) {
            unlink($old_One);
            $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(600,600)->save('fontend/image/products/'.$image_one_name);
            $img_one_url = 'fontend/image/products/'.$image_one_name;
            Product::findOrFail($product_id)->update([
                'image_one' => $img_one_url,
            ]);
 
            $notification=array(
                'message'=>'Image One Updated Successfully ',
                'alert-type'=>'success'
               );
               return Redirect()->route('admin.manage.products')->with($notification);
        }
         //Image Two updated
        if ($request->has('image_two')) {
            unlink($old_two);
            $image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(600,600)->save('fontend/image/products/'.$image_two_name);
            $img_two_url = 'fontend/image/products/'.$image_two_name;
            Product::findOrFail($product_id)->update([           
                'image_two' => $img_two_url              
            ]);
            $notification=array(
                'message'=>'Image Two Updated Successfully ',
                'alert-type'=>'success'
               );
               return Redirect()->route('admin.manage.products')->with($notification);
        }
         //Image Three updated
        if ($request->has('image_three')) {
            unlink($old_three);
            $image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
            Image::make($image_three)->resize(600,600)->save('fontend/image/products/'.$image_three_name);
            $img_three_url = 'fontend/image/products/'.$image_three_name;
            Product::findOrFail($product_id)->update([
                'image_three' => $img_three_url
            ]);
            $notification=array(
                'message'=>'Image Three Updated Successfully ',
                'alert-type'=>'success'
               );
               return Redirect()->route('admin.manage.products')->with($notification);


        }
    }

    
    // ======================= Delete Products ===================== 
    public function delete($product_id){
        $products = Product::findOrFail($product_id);
        $img_one = $products->image_one;
        $img_two = $products->image_two;
        $img_three = $products->image_three;
        unlink($img_one);
        unlink($img_two);
        unlink($img_three);
        Product::findOrFail($product_id)->delete();
        Comment::where('product_id',$product_id)->delete();
        $notification=array(
            'message'=>'Product Deleted Successfully ',
            'alert-type'=>'success'
           );
         return Redirect()->back()->with($notification);
    }

    // ====================== Inactive  ================== 
    public function Inactive($product_id){

        Product::findOrFail($product_id)->update([
            'status' => 0
        ]);
        $notification=array(
            'message'=>'Product Inactive',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }

    // ====================== active ================== 
    public function Active($product_id){

        Product::findOrFail($product_id)->update([
            'status' => 1
        ]);
        $notification=array(
            'message'=>'Product Activated',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    
    // ----------------- product comment ------------------- 
    public function ShowAll(){
        $comments = Comment::latest()->get();
        return view('admin.comment.index',compact('comments'));
    }

    // ---------------- comment view --------------- 
    public function View($id){
        $comment = Comment::findOrFail($id);
        return view('admin.comment.view',compact('comment'));
    }

    // ======================= Delete Comments ===================== 
    public function deleteComment($comment_id){
        Comment::findOrFail($comment_id)->delete();
        $notification=array(
            'message'=>'Comment Deleted Successfully ',
            'alert-type'=>'success'
           );
         return Redirect()->route('admin.product.comments')->with($notification);
    }

}

