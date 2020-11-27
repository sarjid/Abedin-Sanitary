@extends('layouts.admin-master')
@section('contact') active  @endsection
@section('admin_title') conatact us @endsection
@section('admin-content')
   <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Contact us</span>
        </nav>

        <div class="sl-pagebody">
          <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update Contact Info</h6>
        <form action="{{ route('update.contact') }}" method="POST">
            @csrf
          <div class="row row-sm">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">যোগাযোগ এর স্থান: <span class="text-danger">*</span></label>
                    <textarea id="exampleInputEmail1" name="address" cols="60" rows="6">{{ $contact->address }}</textarea>
                @error('address')
                <strong class="text-danger">{{ $message }}</strong>
                @enderror
                  </div>
            </div> 

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">কল করুন: <span class="text-danger">*</span></label>
                    <textarea id="exampleInputEmail1" name="call" cols="60" rows="6">{{ $contact->call }}</textarea>
                  </div> 
                  @error('call')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
            </div> 

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">মেইল করুন: <span class="text-danger">*</span></label>
                    <textarea id="exampleInputEmail1" name="email" cols="60" rows="6">{{ $contact->email }}</textarea>
                  </div> 
                  @error('email')
                  <strong class="text-danger">{{ $message }}</strong>
                  @enderror
            </div> 
                                 
            </div>
            <div class="form-layout-footer mt-3">
                <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Update info</button>
             </div><!-- form-layout-footer -->
            </form>
          </div>
          </div><!-- row -->         
        </div><!-- sl-pagebody -->       
      </div><!-- sl-mainpanel -->    
     
@endsection

