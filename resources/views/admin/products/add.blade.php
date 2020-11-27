@extends('layouts.admin-master')
@section('products') active show-sub @endsection
@section('add-products') active @endsection
@section('admin_title') Add-Products @endsection
@section('admin-content')
   <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Products</span>
          <span class="breadcrumb-item active">Add</span>
        </nav>

        <div class="sl-pagebody">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">New Product Add </h6>
            <form action="{{ route('store.products') }}" method="POST" enctype="multipart/form-data">
              @csrf
               <div class="row row-sm">
                  <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Product Name(Bangla): <span class="text-danger">*</span></label>
                              <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('product_name') }}" aria-describedby="emailHelp" placeholder="product name bangla">

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
                        <option value="{{ $row->id }}">{{ $row->category_name }}</option>
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
                    </select>
                    @error('subcategory_id')
                  <strong class="text-danger">{{$message}}</strong>
                    @enderror

                  </div>
            </div> 
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
                    <label for="exampleInputEmail1">:Delar Under Prodcts<span class="text-danger">*</span></label>
                    <select name="service_id" id="exampleInputEmail1" class="form-control select2" data-placeholder="Choose one">                   
                    </select>
                    @error('service_id')
                  <strong class="text-danger">{{$message}}</strong>
                    @enderror

                  </div>
            </div>
            <div class="col-lg-4">
              <label class="ckbox mt-5"> 
                <input type="checkbox" name="main_slider" value="1">
                <span>Main Slider</span>
              </label>
              <small class="text-danger">এই পণ্যটি মেইন স্লাইডারে দেখতে চাইলে টিক চিহ্ন দিন</small>
            </div> 
          
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Short Description : <span class="text-danger">*</span></label>
                        <textarea name="short_description" id="summernote" ></textarea>
                        @error('short_description')
                         <strong class="text-danger">{{$message}}</strong>
                        @enderror
                      </div>
                </div> 
                
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Long Description: <span class="text-danger">*</span></label>
                      <textarea name="long_description" id="summernote2" ></textarea>
                      @error('long_description')
                    <strong class="text-danger">{{$message}}</strong>
                      @enderror

                    </div>
              </div>  

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image One (Main Thambnail): <span class="text-danger">*</span></label>
                        <input type="file" name="image_one" class="form-control @error('image_one') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="readURL(this);" >
                        <img src="#" id="one" >
                        <small class="text-danger">Image Size Must Be 600*600 pixel</small> <br>
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
                        @error('image_three')
                      <strong class="text-danger">{{$message}}</strong>
                        @enderror

                      </div>
                </div>  
                           
            </div>
            
            <div class="form-layout-footer mt-3">
              <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Add Products</button>
            </div><!-- form-layout-footer -->
          </form>
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

