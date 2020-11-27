@extends('layouts.admin-master')
@section('setting') active show-sub @endsection
@section('site-setting') active @endsection
@section('admin_title') Website Setting @endsection
@section('admin-content')
   <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Settings</span>
          <span class="breadcrumb-item active">Site Setting</span>
        </nav>

        <div class="sl-pagebody">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Site Setting</h6>
            <form action="{{ route('update-site-setting') }}" method="POST" enctype="multipart/form-data">
              @csrf
          <div class="row row-sm">
                     <div class="col-md-4">
                          <div class="form-group">
                              <label for="exampleInputEmail1">Customer Support Number(English): <span class="text-danger">*</span></label>
                              <input type="text" name="customer_support" class="form-control @error('customer_support') is-invalid @enderror" id="exampleInputEmail1" value="{{ $setting->customer_support }}" aria-describedby="emailHelp" placeholder="Phone Number">

                              @error('customer_support')
                            <strong class="text-danger">{{$message}}</strong>
                              @enderror
                            </div>
                      </div>    
                      
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Opening Hour(English): <span class="text-danger">*</span></label>
                            <input type="text" name="opening_hour" class="form-control @error('opening_hour') is-invalid @enderror" id="exampleInputEmail1" value="{{ $setting->opening_hour }}"  aria-describedby="emailHelp" placeholder="opening_hour">

                            @error('opening_hour')
                          <strong class="text-danger">{{$message}}</strong>
                            @enderror
                          </div>
                    </div>    

                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Shop Address (English): <span class="text-danger">*</span></label>
                          <input type="text" name="address_english" class="form-control @error('address_english') is-invalid @enderror" id="exampleInputEmail1" value="{{ $setting->address_english }}"aria-describedby="emailHelp" placeholder="address_english">

                          @error('address_english')
                        <strong class="text-danger">{{$message}}</strong>
                          @enderror
                        </div>
                  </div> 


                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Facebook link: <span class="text-danger">*</span></label>
                        <input type="text" name="facebook_link" class="form-control @error('facebook_link') is-invalid @enderror" id="exampleInputEmail1" value="{{ $setting->facebook_link }}" aria-describedby="emailHelp" placeholder="facebook_link">

                        @error('facebook_link')
                      <strong class="text-danger">{{$message}}</strong>
                        @enderror
                      </div>
                </div> 

                <div class="col-md-4">
                  <div class="form-group">
                      <label for="exampleInputEmail1">Twitter link: <span class="text-danger">*</span></label>
                      <input type="text" name="twitter_link" class="form-control @error('twitter_link') is-invalid @enderror" id="exampleInputEmail1" value="{{ $setting->twitter_link }}"  aria-describedby="emailHelp" placeholder="twitter_link">

                      @error('twitter_link')
                    <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
              </div> 


              <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Instagram link: <span class="text-danger">*</span></label>
                    <input type="text" name="instagram_link" class="form-control @error('instagram_link') is-invalid @enderror" id="exampleInputEmail1" value="{{ $setting->instagram_link }}"  aria-describedby="emailHelp" placeholder="instagram_link">

                    @error('instagram_link')
                  <strong class="text-danger">{{$message}}</strong>
                    @enderror
                  </div>
            </div> 

            <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Linkedin link: <span class="text-danger">*</span></label>
                  <input type="text" name="linkedin_link" class="form-control @error('linkedin_link') is-invalid @enderror" id="exampleInputEmail1"value="{{ $setting->linkedin_link }}"  aria-describedby="emailHelp" placeholder="linkedin_link">

                  @error('linkedin_link')
                <strong class="text-danger">{{$message}}</strong>
                  @enderror
                </div>
          </div>               
                
                 <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Website Logo <span class="text-danger">*</span></label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" id="exampleInputEmail1"  aria-describedby="emailHelp"  onchange="readURLlogo(this);" >
                        
                        <small class="text-danger">Logo Size Must Be widht 204 & height 70 pixel</small> <br>
                        @error('logo')
                      <strong class="text-danger">{{$message}}</strong>
                        @enderror
                        <img src="#" id="logo" > <br>
                      </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1"> <span class="text-danger">*</span></label>
                        <img src="{{ asset($setting->logo) }}" >
                      </div>
                  </div>                        
            </div>
            
            <div class="form-layout-footer mt-3">
              <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Upate Setting</button>
            </div><!-- form-layout-footer -->
          </form>
          </div>
          </div><!-- row -->         
        </div><!-- sl-pagebody -->       
      </div><!-- sl-mainpanel -->    
      
     
@endsection

