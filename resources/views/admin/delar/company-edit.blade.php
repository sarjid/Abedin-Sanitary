@extends('layouts.admin-master')
@section('delars') active show-sub @endsection
@section('company') active @endsection
@section('admin_title')EditCompany Name @endsection
@section('admin-content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Delar</span>
          <span class="breadcrumb-item active">Company Name Update</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">        
                <div class="col-md-6 m-auto">
                  <div class="card">
                      <div class="card-body">
                        <h5 class="text-danger text-center">Update Company</h5>
                        <hr>
                          <form action="{{ route('update.company') }}" method="POST">
                              @csrf
                              <input type="hidden" value="{{ $delar->id }}" name="id">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Company Name(Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $delar->company_name }}"  aria-describedby="emailHelp" placeholder="company name in Bangla">    
                                @error('company_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror   
                              </div>    
                              <button type="submit" class="btn btn-primary">Update Company</button>
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

