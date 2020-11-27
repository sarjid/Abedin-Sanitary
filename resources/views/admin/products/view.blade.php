@extends('layouts.admin-master')
@section('products') active show-sub @endsection
@section('add-products') active @endsection
@section('admin_title') View-Products @endsection
@section('admin-content')
   <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Products</span>
          <span class="breadcrumb-item active">View</span>
        </nav>

        <div class="sl-pagebody">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">View Products</h6>
          <div class="row row-sm">
                  <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Product Name(Bangla): <span class="text-danger">*</span></label>
                              <input type="text" name="product_name" disabled class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $product->product_name }}" aria-describedby="emailHelp" placeholder="product name bangla">

                              @error('product_name')
                            <strong class="text-danger">{{$message}}</strong>
                              @enderror
                            </div>
                  </div>             

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name: <span class="text-danger">*</span></label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" disabled value="{{ $product->category->category_name }}" aria-describedby="emailHelp" placeholder="product name bangla">
                    @error('category_id')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror 
                  </div>              
                    
              </div> 

              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sub-Category: <span class="text-danger">*</span></label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" disabled value="{{ $product->subcategory->subcategory_name }}" aria-describedby="emailHelp" placeholder="product name bangla">
                    @error('subcategory_id')
                  <strong class="text-danger">{{$message}}</strong>
                    @enderror

                  </div>
            </div> 
            @if ($product->company_id == NULL)
            @else           
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Delar Name: <span class="text-danger">*</span></label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" disabled value="{{ $product->company->company_name }}" aria-describedby="emailHelp" placeholder="product name bangla">
                    @error('company_id')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror    
                  </div>                 
            </div>            
              <div class="col-md-4">
                <label for="exampleInputEmail1">Delar Under Product: <span class="text-danger">*</span></label>
                <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" disabled value="{{ $product->service->delar_product_name}}" aria-describedby="emailHelp" placeholder="product name bangla">
                    @error('service_id')
                  <strong class="text-danger">{{$message}}</strong>
                    @enderror

                  </div>
             </div>
             @endif

            <div class="col-md-4">
              <label class="ckbox"> 
                <input type="checkbox" disabled name="main_slider" {{ $product->main_slider == 1 ? 'checked':'' }} value="1">
                <span>Main Slider</span>
              </label>
            </div> 
          
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Short Description : <span class="text-danger">*</span></label>
                        <textarea name="short_description" disabled id="summernote">{{ $product->short_description }}</textarea>
                        @error('short_description')
                         <strong class="text-danger">{{$message}}</strong>
                        @enderror
                      </div>
                </div> 
                
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Long Description: <span class="text-danger">*</span></label>
                      <textarea name="long_description" disabled id="summernote2" >{{ $product->long_description }}</textarea>
                      @error('long_description')
                    <strong class="text-danger">{{$message}}</strong>
                      @enderror

                    </div>
              </div>  

              
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Main Thambnail: <span class="text-danger">*</span></label>
                        {{-- <input type="file" name="image_one" class="form-control @error('image_one') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);" >
                        <img src="#" id="one" > --}}

                        <img src="{{ asset($product->image_one) }}" height="83px;" width="88px;" alt="">

                        @error('image_one')
                      <strong class="text-danger">{{$message}}</strong>
                        @enderror

                      </div>
                </div> 

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image Two: <span class="text-danger">*</span></label>
                        {{-- <input type="file" name="image_one" class="form-control @error('image_one') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);" >
                        <img src="#" id="one" > --}}

                        <img src="{{ asset($product->image_two) }}" height="83px;" width="88px;" alt="">

                        @error('image_one')
                      <strong class="text-danger">{{$message}}</strong>
                        @enderror

                      </div>
                </div> 

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image Three: <span class="text-danger">*</span></label>
                        {{-- <input type="file" name="image_one" class="form-control @error('image_one') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);" >
                        <img src="#" id="one" > --}}

                        <img src="{{ asset($product->image_three) }}" height="83px;" width="88px;" alt="">

                        @error('image_one')
                      <strong class="text-danger">{{$message}}</strong>
                        @enderror

                      </div>
                </div> 
           
                           
            </div>
            
            <div class="form-layout-footer mt-3">
              <a href="{{ route('admin.manage.products') }}" class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Back</a>
            </div><!-- form-layout-footer -->
          </div>
          </div><!-- row -->         
        </div><!-- sl-pagebody -->       
      </div><!-- sl-mainpanel -->    
      {{-- <script src="{{asset('backend')}}/lib/jquery.min.js">
      </script> --}}


     
@endsection

