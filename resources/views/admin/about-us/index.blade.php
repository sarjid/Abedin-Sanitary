@extends('layouts.admin-master')
@section('about-us') active @endsection
@section('admin_title') about us @endsection
@section('admin-content')
   <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="">Admin</a>
          <span class="breadcrumb-item active">About-Us</span>
        </nav>

        <div class="sl-pagebody">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update About Us Info </h6>
            <form action="{{ route('update-about-us') }}" method="POST">
              @csrf
          <div class="row row-sm">
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">আমাদের সম্পর্কে : <span class="text-danger">*</span></label>
                        <textarea name="about_us" id="summernote" >{{ $about->about_us }}</textarea>
                        @error('about_us')
                         <strong class="text-danger">{{$message}}</strong>
                        @enderror
                      </div>
                </div> 
                
                <div class="col-md-12">
                  <div class="form-group">
                      <label for="exampleInputEmail1">আমরা কি কি করি : <span class="text-danger">*</span></label>
                      <textarea name="what_we_do" id="summernote2" >{{ $about->what_we_do }}</textarea>
                      @error('what_we_do')
                    <strong class="text-danger">{{$message}}</strong>
                      @enderror

                    </div>
              </div>               
                           
            </div>
            
            <div class="form-layout-footer mt-3">
              <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update Info</button>
            </div><!-- form-layout-footer -->
          </form>
          </div>
          </div><!-- row -->         
        </div><!-- sl-pagebody -->       
      </div><!-- sl-mainpanel -->    
      {{-- <script src="{{asset('backend')}}/lib/jquery.min.js">
      </script> --}}

     
@endsection

