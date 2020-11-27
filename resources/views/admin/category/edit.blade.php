@extends('layouts.admin-master')
@section('categories') active show-sub @endsection
@section('sub-category') active  @endsection
@section('admin_title') Edit Sub-Category @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Category</span>
          <span class="breadcrumb-item active">Update</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">        
                <div class="col-md-6 m-auto">
                  <div class="card">
                      <div class="card-body">
                        <h5 class="text-danger text-center">Update Category</h5>
                        <hr>
                          <form action="{{ route('update.category') }}" method="POST">
                              @csrf
                              <input type="hidden" value="{{ $category->id }}" name="id">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Category Name: <span class="text-danger">*</span></label>
                                <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $category->category_name }}"  aria-describedby="emailHelp" placeholder="category Name">    
                                @error('category_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror   
                              </div>    
                              <button type="submit" class="btn btn-primary">Update Category</button>
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

