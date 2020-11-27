@extends('layouts.admin-master')
@section('message') active show-sub @endsection
@section('admin_title') View Message @endsection
@section('admin-content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Portfolio</a>
        <span class="breadcrumb-item active">View Message'</span>
      </nav>

      <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">View Message</h6>
            <div class="row row-sm">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Name:<span class="text-danger">*</span></label>
                          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" disabled value="{{ $msg->name }}" aria-describedby="emailHelp" placeholder="Your Name">                         
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:<span class="text-danger">*</span></label>
                            <input type="text"  name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" disabled value="{{ $msg->email }}" aria-describedby="emailHelp" placeholder="Your Name">   
                           
                          </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Subject: <span class="text-danger">*</span></label>
                              <textarea name="service_descp" disabled id="exampleInputEmail1" aria-describedby="emailHelp" cols="60" rows="6">{{ $msg->subject }}</textarea>                            
                            </div>
                         </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Message: <span class="text-danger">*</span></label>
                                <textarea name="service_descp" disabled id="exampleInputEmail1" aria-describedby="emailHelp" cols="60" rows="6">{{ $msg->message }}</textarea>
      
                              </div>
                            </div>
                           
                        </div>
                        
                      </div>
                      </div><!-- row -->         
                    </div><!-- sl-pagebody -->       
                  </div><!-- sl-mainpanel -->    
<!-- ########## END: MAIN PANEL ########## -->

@endsection

