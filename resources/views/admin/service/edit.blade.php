@extends('layouts.admin-master')
@section('services') active  @endsection
@section('admin_title') Edit Services @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item active">Update-Services</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-6 m-auto">
                  <div class="card">
                      <div class="card-body">
                        <h5 class="text-danger text-center">Update Your Service</h5>
                        <hr>
                          <form action="{{ url('admin/services-update/'.$service->id) }}" method="POST">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Service Name(Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="service_name" class="form-control @error('service_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $service->service_name }}"  aria-describedby="emailHelp" placeholder="service name"> 
                                @error('service_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Service Details: <span class="text-danger">*</span></label>
                                {{-- <textarea name="service_details" id="summernote2"></textarea> --}}
                                <textarea name="service_details" id="exampleInputEmail1" cols="60" rows="6">{{ $service->service_details }}</textarea>
                                @error('service_details')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror        
                            </div>
                             <button type="submit" class="btn btn-primary">Update Service</button>
                            </form> 
                      </div>
                  </div>
               </div>       
            </div>
          </div><!-- row -->         
        </div><!-- sl-pagebody -->       
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->      
@endsection

