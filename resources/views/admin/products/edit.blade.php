@extends('layouts.admin-master')
@section('products') active show-sub @endsection
@section('manage-products') active @endsection
@section('admin_title') Edit-Products @endsection
@section('admin-content')
   <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Products</span>
          <span class="breadcrumb-item active">Update</span>
        </nav>

        <div class="sl-pagebody">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Products</h6>
            <form action="{{ url('admin/products-update-withoutimg/'.$product->id) }}" method="POST">
              @csrf
          <div class="row row-sm">
                  <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Product Name(Bangla): <span class="text-danger">*</span></label>
                              <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $product->product_name }}" aria-describedby="emailHelp" placeholder="product name bangla">

                              @error('product_name')
                            <strong class="text-danger">{{$message}}</strong>
                              @enderror
                            </div>
                  </div>             

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name: <span class="text-danger">*</span></label>
                      <select class="form-control select2-show-search  @error('category_id') is-invalid @enderror" name="category_id" data-placeholder="Choose Category">
                        <option label="Choose one"></option>
                        @foreach ($categories as $row)                             
                          <option value="{{ $row->id }}" {{ $row->id == $product->category_id ? "selected":'' }}>{{ $row->category_name }}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror    
                    </div>              
                      
                </div> 
  
                <div class="col-md-4">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Sub-Category: <span class="text-danger">*</span></label>
                      <select name="subcategory_id" id="exampleInputEmail1" class="form-control select2" data-placeholder="Choose one">  
                        @foreach ($subcategories as $row)                         
                        <option value="{{ $row->id }}" {{ $row->id == $product->subcategory_id ? "selected":'' }} >{{ $row->subcategory_name }}</option>
                        @endforeach                 
                      </select>
                      @error('subcategory_id')
                    <strong class="text-danger">{{$message}}</strong>
                      @enderror
  
                    </div>
              </div> 
              
        @if ($product->company_id == NULL)
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Delar Name: <span class="text-danger">*</span></label>
                    <select class="form-control select2-show-search  @error('company_id') is-invalid @enderror" name="company_id" data-placeholder="Choose Company">
                      <option label="Choose one"></option>
                      @foreach ($delars as $row)                             
                        <option value="{{ $row->id }}">{{ $row->company_name }}</option>
                      @endforeach
                    </select>
                    @error('company_id')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror    
                </div>                 
            </div> 
              
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">:Delar Under Products<span class="text-danger">*</span></label>
                    <select name="service_id" id="exampleInputEmail1" class="form-control select2" data-placeholder="Choose one">                       
                    </select>
                    @error('service_id')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror

                </div>
            </div>
       @else           
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Delar Name: <span class="text-danger">*</span></label>
                    <select class="form-control select2-show-search  @error('company_id') is-invalid @enderror" name="company_id" data-placeholder="Choose Company">
                      <option label="Choose one"></option>
                      @foreach ($delars as $row)                             
                        <option value="{{ $row->id }}" {{ $row->id == $product->company_id ? "selected":'' }}>{{ $row->company_name }}</option>
                      @endforeach
                    </select>
                    @error('company_id')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror    
                </div>                 
            </div> 
              
              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">:Delar Under Products<span class="text-danger">*</span></label>
                    <select name="service_id" id="exampleInputEmail1" class="form-control select2" data-placeholder="Choose one">  
                        @foreach ($delar_services as $row)                         
                        <option value="{{ $row->id }}" {{ $row->id == $product->service_id ? "selected":'' }} >{{ $row->delar_product_name }}</option>
                        @endforeach                         
                    </select>
                    @error('service_id')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror

                </div>
            </div>
        @endif
            <div class="col-md-4 mt-5">
              <label class="ckbox"> 
                <input type="checkbox" name="main_slider" {{ $product->main_slider == 1 ? 'checked':'' }} value="1">
                <span>Main Slider</span>
              </label>
              <small class="text-danger">এই পণ্যটি মেইন স্লাইডারে দেখতে চাইলে টিক চিহ্ন দিন</small>
            </div> 
          
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Short Description : <span class="text-danger">*</span></label>
                        <textarea name="short_description" id="summernote">{{ $product->short_description }}</textarea>
                        @error('short_description')
                         <strong class="text-danger">{{$message}}</strong>
                        @enderror
                      </div>
                </div> 
                
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Long Description: <span class="text-danger">*</span></label>
                      <textarea name="long_description" id="summernote2" >{{ $product->long_description }}</textarea>
                      @error('long_description')
                    <strong class="text-danger">{{$message}}</strong>
                      @enderror

                    </div>
              </div>               
                           
            </div>
            
            <div class="form-layout-footer mt-3">
              <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update Data</button>
            </div><!-- form-layout-footer -->
          </form>

          <form action="{{ url('admin/products-update-with-image/'.$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <input type="hidden" name="old_one" value="{{ $product->image_one }}">
            <input type="hidden" name="old_two" value="{{ $product->image_two }}">
            <input type="hidden" name="old_three" value="{{ $product->image_three }}">
            <div class="row row-sm mt-5">                               
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Main Thambnail: <span class="text-danger">*</span></label>
                    <input type="file" name="image_one" class="form-control @error('image_one') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);" >
                    <img src="#" id="one" >
                    <small class="text-danger">Image Size Must Be 600*600 pixel</small> <br>
                    <img src="{{ asset($product->image_one) }}" height="83px;" width="88px;" alt="">
                    @error('image_one')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror

                    </div>
            </div> 
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Image Two <span class="text-danger">*</span></label>
                    <input type="file" name="image_two" class="form-control @error('image_two') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('image_two') }}" aria-describedby="emailHelp" placeholder="video link" onchange="readURL1(this);" >
                    <img src="#" id="two" >
                    <small class="text-danger">Image Size Must Be 600*600 pixel</small> <br>
                    <img src="{{ asset($product->image_two) }}" height="83px;" width="88px;" alt="">

                    @error('image_two')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror

                    </div>
            </div>  

            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Image Three: <span class="text-danger">*</span></label>
                    <input type="file" name="image_three" class="form-control @error('image_three') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('image_three') }}" aria-describedby="emailHelp"  onchange="readURL2(this);" >
                    <img src="#" id="three" >
                    <small class="text-danger">Image Size Must Be 600*600 pixel</small> <br>
                    <img src="{{ asset($product->image_three) }}" height="83px;" width="88px;" alt="">

                    @error('image_three')
                    <strong class="text-danger">{{$message}}</strong>
                    @enderror

                    </div>
            </div>  
            <div class="form-layout-footer mt-3">
                <button  class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update Image</button>
                </div>
            </form>
            </div>

          </div>
          </div><!-- row -->         
        </div><!-- sl-pagebody -->       
      </div><!-- sl-mainpanel -->    
      {{-- <script src="{{asset('backend')}}/lib/jquery.min.js">
      </script> --}}
<script src="{{asset('backend')}}/lib/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
      
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="category_id"]').on('change', function(){
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: "{{  url('/get/subcategory/') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){

                          $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                      });

                },

            });
        } else {
            alert('danger');
        }

    });

    $('select[name="company_id"]').on('change', function(){
        var company_id = $(this).val();
        if(company_id) {
            $.ajax({
                url: "{{  url('/get/delar/service/') }}/"+company_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="service_id"]').empty();
                      $.each(data, function(key, value){

                          $('select[name="service_id"]').append('<option value="'+ value.id +'">' + value.delar_product_name + '</option>');

                      });

                },

            });
        } else {
            alert('danger');
        }

    });
  

});

</script>
     
@endsection

