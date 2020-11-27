<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Delar;
use App\Model\Product;
use App\Model\Delarservice;
use Carbon\Carbon;

class DelarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
// =============== show add or index page in company add page ========= 
    public function CompanyAdd(){
        $delars = Delar::latest()->get();
        return view('admin.delar.add-company',compact('delars'));
    }

    // ==============store company name =========== 
    public function storeCompany(Request $request){
        $request->validate([
            'company_name' => 'required|unique:delars,company_name|max:255',
        ]);

       
       $insert = Delar::insert([
        'company_name' => $request->company_name,
        'company_slug' => str_replace(' ','-',$request->company_name),
        'created_at' => Carbon::now()
       ]);

       if ($insert) {
        $notification=array(
            'message'=>'Company Name Added Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

       }    
    }
    // ========================== edit delar company name =========== 
    public function editCompany($id){
        $delar = Delar::findOrFail($id);
        return view('admin.delar.company-edit',compact('delar'));
    }

    // ========== update company name ======
    public function updateCompany(Request $request){
        $request->validate([
            'company_name' => 'required|max:255',
        ]);
       $id = $request->id;
       $delar = Delar::findOrFail($id);
       if ($request->company_name !== $delar->company_name) {             
            $request->validate([
                'company_name' => 'unique:delars,company_name|max:255',
            ]);  
            Delar::findOrFail($id)->update([
                'company_name' => $request->company_name,
                'company_slug' => str_replace(' ','-',$request->company_name),
                'updated_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Company Name Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.company')->with($notification);
       }else{       
        Delar::findOrFail($id)->update([
                'company_name' => $request->company_name,
                'company_slug' => str_replace(' ','-',$request->company_name),
                'updated_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Company Name Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.company')->with($notification);
       }        
    }

    // =============== Delete deler Company ========= 
    public function DeleteCompany($id){
      
        $products = Product::where('company_id',$id)->get();
        if ($products) {
            foreach ($products as $delete) {
                $img_one = $delete->image_one;
                $img_two = $delete->image_two;
                $img_three = $delete->image_three;
                unlink($img_one);
                unlink($img_two);
                unlink($img_three);
                $product = Product::where('company_id',$id)->delete();
            } 
            $delete = Delar::findOrFail($id)->delete();
            $sub_delete = Delarservice::where('company_id',$id)->delete();          
           
                $notification=array(
                    'message'=>'Delete Done',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
           
        }else{
            $delete = Delar::findOrFail($id)->delete();
            $sub_delete = Delarservice::where('company_id',$id)->delete();
            if ($delete && $sub_delete ) {
                $notification=array(
                    'message'=>'Delete Done',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }
        }
       
    }

    // / ====================== Inactive Categories ==================
       public function inactiveCompany($id){

        $inactive = Delar::findOrFail($id)->update([
            'status' => 0
        ]);
        if ($inactive) {
            $notification=array(
                'message'=>'Inactivated',
                'alert-type'=>'error'
            );
           return Redirect()->back()->with($notification);
        }
       
    }

    // ====================== active categories ================== 
    public function ActiveCompany($id){

       $active = Delar::findOrFail($id)->update([
            'status' => 1
        ]);
        if ($active) {
            $notification=array(
                'message'=>'Activated',
                'alert-type'=>'success'
            );
           return Redirect()->back()->with($notification);
        }
    }

// ==================================== delar service part ============= 
    public function DelarProduct(){
        $delar_products = Delarservice::latest()->get();
        $companies = Delar::latest()->where('status',1)->get();
        return view('admin.delar.add-service',compact('delar_products','companies'));
    }

    // ================== store delar products =================== 
    public function StoredelarProduct(Request $request){
        $request->validate([
            'company_id' => 'required',
            'delar_product_name' => 'required|unique:delarservices,delar_product_name|max:255',
        ],[
            'company_id.required' => 'Please Select Any Company',
        ]);
       
       $insert = Delarservice::insert([
        'company_id' => $request->company_id,
        'delar_product_name' => $request->delar_product_name,
        'delar_product_slug' => str_replace(' ','-',$request->delar_product_name),
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
    // ============= edit service ========= 
    public function EditService($id){
        $delar_product = Delarservice::findOrFail($id);
        $companies = Delar::latest()->where('status',1)->get();
        return view('admin.delar.service-edit',compact('delar_product','companies'));
    }


    // ============= update services =========== 
    public function UpdateProduct(Request $request){
        $request->validate([
            'company_id' => 'required',
            'delar_product_name' => 'required|max:255',
        ],[
            'company_id.required' => 'Please Select Any Company',
        ]);
       $id = $request->id;
       $delar = Delarservice::findOrFail($id);
       if ($request->delar_product_name !== $delar->delar_product_name) {             
            $request->validate([
                'delar_product_name' => 'required|unique:delarservices,delar_product_name|max:255|max:255',
            ]);  
            Delarservice::findOrFail($id)->update([
                'company_id' => $request->company_id,
                'delar_product_name' => $request->delar_product_name,
                'delar_product_slug' => str_replace(' ','-',$request->delar_product_name),
                'updated_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.company.products')->with($notification);
       }else{       
        Delarservice::findOrFail($id)->update([
                'company_id' => $request->company_id,
                'delar_product_name' => $request->delar_product_name,
                'delar_product_slug' => str_replace(' ','-',$request->delar_product_name),
                'updated_at' => Carbon::now()
            ]);
            $notification=array(
                'message'=>'Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('admin.company.products')->with($notification);
       }        
    }
      // =============== Delete SErvice ========= 
      public function DeleteService($id){
       
        $products = Product::where('service_id',$id)->first();
        if ($products) {
            foreach ($products as $delete) {
                $img_one = $delete->image_one;
                $img_two = $delete->image_two;
                $img_three = $delete->image_three;
                unlink($img_one);
                unlink($img_two);
                unlink($img_three);
                Product::where('service_id',$id)->delete();
            }          
            Delarservice::findOrFail($id)->delete();       
            $notification=array(
                'message'=>'Delete Done',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else {
            $delete = Delarservice::findOrFail($id)->delete(); 
            if ($delete) {
                $notification=array(
                    'message'=>'Delete Done',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
            }
        }
        
    }

    // / ====================== Inactive service ==================
       public function InactiveService($id){

        $inactive = Delarservice::findOrFail($id)->update([
            'status' => 0
        ]);
        if ($inactive) {
            $notification=array(
                'message'=>'Inactivated',
                'alert-type'=>'error'
            );
           return Redirect()->back()->with($notification);
        }
       
    }

    // ====================== active service ================== 
    public function ActiveService($id){

       $active = Delarservice::findOrFail($id)->update([
            'status' => 1
        ]);
        if ($active) {
            $notification=array(
                'message'=>'Activated',
                'alert-type'=>'success'
            );
           return Redirect()->back()->with($notification);
        }
    }


 }
