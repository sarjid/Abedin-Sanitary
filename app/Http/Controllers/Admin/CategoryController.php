<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Subcategory;
use Carbon\Carbon;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // =========== index page show ============= 
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }


    // =============== stote category ================= 
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name|max:255',
        ]);

       
       $insert = Category::insert([
        'category_name' => $request->category_name,
        'category_slug' => str_replace(' ','-',$request->category_name),
        'created_at' => Carbon::now()
       ]);

       if ($insert) {
        $notification=array(
            'message'=>'Category insert Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

       }    
    }

    // ================= edit category ============= 
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    //  =================== update category ======== 
    public function update(Request $request){
        $request->validate([
            'category_name' => 'required|max:255',
        ]);
       $cat_id = $request->id;
       $cat = Category::findOrFail($cat_id);
       if ($request->category_name !== $cat->category_name) {             
            $request->validate([
                'category_name' => 'unique:categories,category_name|max:255',
            ]);  
            Category::findOrFail($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => str_replace(' ','-',$request->category_name),
                'updated_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Category Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.category')->with($notification);
       }else{       
            Category::findOrFail($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => str_replace(' ','-',$request->category_name),
                'updated_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Category Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.category')->with($notification);
       }        
    }

    // =============== delete category ========= 
    public function delete($id){    
        $products = Product::where('category_id',$id)->get();
        if ($products) {
            foreach ($products as $delete) {
                $img_one = $delete->image_one;
                $img_two = $delete->image_two;
                $img_three = $delete->image_three;
                unlink($img_one);
                unlink($img_two);
                unlink($img_three);
                Product::where('category_id',$id)->delete();
            }
             Category::findOrFail($id)->delete();
             Subcategory::where('category_id',$id)->delete();
                $notification=array(
                    'message'=>'Delete Done',
                    'alert-type'=>'success'
                );
                return Redirect()->route('admin.category')->with($notification);
           
        }else{
            $delete = Category::findOrFail($id)->delete();
            $sub_delete = Subcategory::where('category_id',$id)->delete();
            if ($delete && $sub_delete) {
                $notification=array(
                    'message'=>'Delete Done',
                    'alert-type'=>'success'
                );
                return Redirect()->route('admin.category')->with($notification);
            }
        }
       
    }

       // ====================== Inactive Categories ================== 
       public function inactive($cat_id){

        $inactive = Category::findOrFail($cat_id)->update([
            'status' => 0
        ]);
        if ($inactive) {
            $notification=array(
                'message'=>'Category Inactivated',
                'alert-type'=>'error'
            );
           return Redirect()->back()->with($notification);
        }
       
    }

    // ====================== active categories ================== 
    public function active($cat_id){

       $active = Category::findOrFail($cat_id)->update([
            'status' => 1
        ]);
        if ($active) {
            $notification=array(
                'message'=>'Category Activated',
                'alert-type'=>'success'
            );
           return Redirect()->back()->with($notification);
        }
    }

    // ========================= sub category ==================== 
    public function Subindex(){
        $subcategories = Subcategory::latest()->get();
        $categories = Category::latest()->where('status',1)->get();
        return view('admin.sub-category.index',compact('subcategories','categories'));
    }

    // ============store subcategory ========= 
    public function SubStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:subcategories,subcategory_name|max:255',
        ],[
            'category_id.required' => 'Select Any Category',
        ]);
       
       $insert = Subcategory::insert([
        'category_id' => $request->category_id,
        'subcategory_name' => $request->subcategory_name,
        'subcategory_slug' => str_replace(' ','-',$request->subcategory_name),
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

    // ========= edit subcategory =======
    public function Subedit($id){
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::latest()->where('status',1)->orderBy('category_name','ASC')->get();
        return view('admin.sub-category.edit',compact('subcategory','categories'));
    }

    // ============== update subcategory ======= 
    public function Subupdate(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|max:255',
        ],[
            'category_id.required' => 'Select Any Category',
        ]);
       $subcat_id = $request->id;
       $sub_cat = Subcategory::findOrFail($subcat_id);
       if ($request->subcategory_name !== $sub_cat->subcategory_name) {             
            $request->validate([
                'subcategory_name' => 'required|unique:subcategories,subcategory_name|max:255',
            ]);  
            Subcategory::findOrFail($subcat_id)->update([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => str_replace(' ','-',$request->subcategory_name),
                'updated_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Sub-Category Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.sub.category')->with($notification);
       }else{       
            Subcategory::findOrFail($subcat_id)->update([
                'category_id' => $request->category_id,
                'subcategory_name' => $request->subcategory_name,
                'subcategory_slug' => str_replace(' ','-',$request->subcategory_name),
                'updated_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Sub-Category Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.sub.category')->with($notification);
       }        
    }

    // =============== delete subcat =============== 
    public function subDelete($subcat_id){
        $products = Product::where('subcategory_id',$subcat_id)->get();
        if ($products) {
           foreach ($products as $delete) {
            $img_one = $delete->image_one;
            $img_two = $delete->image_two;
            $img_three = $delete->image_three;
            unlink($img_one);
            unlink($img_two);
            unlink($img_three);
            Product::where('subcategory_id',$subcat_id)->delete();
           }
           Subcategory::findOrFail($subcat_id)->delete();
           $notification=array(
            'message'=>'Delete Done',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
   
        }else{
            Subcategory::findOrFail($subcat_id)->delete();
            $notification=array(
                'message'=>'Delete Done',
                'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
        }

    }
    // ====================== Inactive Sub Categories ================== 
    public function Subinactive($subcat_id){

        $inactive = Subcategory::findOrFail($subcat_id)->update([
            'status' => 0
        ]);
        if ($inactive) {
            $notification=array(
                'message'=>'Sub-Category Inactivated',
                'alert-type'=>'error'
            );
           return Redirect()->back()->with($notification);
        }
       
    }

    // ====================== active sub categories ================== 
    public function Subactive($subcat_id){

       $active = Subcategory::findOrFail($subcat_id)->update([
            'status' => 1
        ]);
        if ($active) {
            $notification=array(
                'message'=>'Sub-Category Activated',
                'alert-type'=>'success'
            );
           return Redirect()->back()->with($notification);
        }
    }
}
