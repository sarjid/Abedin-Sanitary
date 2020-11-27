@extends('layouts.admin-master')
@section('services') active  @endsection
@section('admin_title') Edit Review @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item active">Update-Review</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-6 m-auto">
                  <div class="card">
                      <div class="card-body">
                        <h5 class="text-danger text-center">Update Customer Review</h5>
                        <hr>
                          <form action="{{ url('admin/customer/review-update/'.$review->id) }}" method="POST">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputEmail1">Customer Name(Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="customer_name" class="form-control @error('customer_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $review->customer_name }}"  aria-describedby="emailHelp" placeholder="customer name"> 
                                @error('customer_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer Review: <span class="text-danger">*</span></label>
                                <textarea name="customer_review" id="" cols="60" rows="6">{{ $review->customer_review }}</textarea>
                                @error('customer_review')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror        
                            </div>
                             <button type="submit" class="btn btn-primary">Update Review</button>
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

