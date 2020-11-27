@extends('layouts.admin-master')
@section('products') active show-sub @endsection
@section('comments') active @endsection
@section('admin_title') View-Comments @endsection
@section('admin-content')
   <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Products</span>
          <span class="breadcrumb-item active">View</span>
          <span class="breadcrumb-item active">Comments</span>
        </nav>

        <div class="sl-pagebody">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">View Comment</h6>
          <div class="row row-sm">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Image: <span class="text-danger">*</span></label>
                    {{-- <input type="file" name="image_one" class="form-control @error('image_one') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);" >
                    <img src="#" id="one" > --}}

                    <img src="{{ asset($comment->product->image_one) }}" height="83px;" width="88px;" alt="">

                  </div>
            </div>
                   <div class="col-md-4">
                         <div class="form-group">
                            <label for="exampleInputEmail1">Product Name(Bangla): <span class="text-danger">*</span></label>
                            <input type="text" name="product_name" disabled class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $comment->product->product_name }}" aria-describedby="emailHelp" >
                        </div>             
                    </div>             

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name: <span class="text-danger">*</span></label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" disabled value="{{ $comment->your_name}}" aria-describedby="emailHelp">                 
                  </div>              
                    
              </div> 

              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email: <span class="text-danger">*</span></label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" disabled value="{{ $comment->email }}" aria-describedby="emailHelp" placeholder="product name bangla">
                  </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Customer Comment: <span class="text-danger">*</span></label>
                    <textarea id="exampleInputEmail1" disabled cols="60" rows="6">{{ $comment->comment }}</textarea>
                
                  </div>
            </div> 
                             
                           
            </div>
            
            <div class="form-layout-footer mt-3">
              <a href="{{ route('admin.product.comments') }}" class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Back</a>
              <a href="{{ url('admin/product/comments-delete/'.$comment->id) }}" id="delete" class="btn btn-danger mg-r-5" type="submit" style="cursor: pointer;">Delete Comment <i class="fa fa-trash"></i></a>
            </div><!-- form-layout-footer -->
          </div>
          </div><!-- row -->         
        </div><!-- sl-pagebody -->       
      </div><!-- sl-mainpanel -->    
      {{-- <script src="{{asset('backend')}}/lib/jquery.min.js">
      </script> --}}


     
@endsection

