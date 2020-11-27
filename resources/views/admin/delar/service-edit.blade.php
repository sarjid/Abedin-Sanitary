@extends('layouts.admin-master')
@section('delars') active show-sub @endsection
@section('company-products') active @endsection
@section('admin_title')Delar Product Edit @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Delars</span>
          <span class="breadcrumb-item active">Update Service</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">        
                <div class="col-md-6 m-auto">
                  <div class="card">
                      <div class="card-body">
                        <h5 class="text-danger text-center">Update Service</h5>
                        <hr>
                          <form action="{{ route('update.delar.service') }}" method="POST">
                              @csrf
                              <input type="hidden" value="{{ $delar_product->id }}" name="id">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Select Company Name: <span class="text-danger">*</span></label>
                                <select class="form-control select2-show-search  @error('company_id') is-invalid @enderror" name="company_id" data-placeholder="Choose one (with searchbox)">
                                  <option label="Choose one"></option>
                                  @foreach ($companies as $row)                             
                                    <option value="{{ $row->id }}" {{ $row->id == $delar_product->company_id ? 'selected':'' }}>{{ $row->company_name }}</option>
                                  @endforeach
                                </select>
                                @error('company_id')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Delar Product Name(Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="delar_product_name" class="form-control @error('delar_product_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $delar_product->delar_product_name }}"  aria-describedby="emailHelp" placeholder="Delar Product Name Bangla"> 
                                @error('delar_product_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                              <button type="submit" class="btn btn-primary">Update Services</button>
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

