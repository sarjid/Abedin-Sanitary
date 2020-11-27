@extends('layouts.admin-master')
@section('categories') active show-sub @endsection
@section('category') active  @endsection
@section('admin_title') Edit Sub-Category @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Admin</a>
          <span class="breadcrumb-item active">Sub-Category</span>
          <span class="breadcrumb-item active">Update</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">        
                <div class="col-md-6 m-auto">
                  <div class="card">
                      <div class="card-body">
                        <h5 class="text-danger text-center">Update Sub-Category</h5>
                        <hr>
                          <form action="{{ route('update.sub.category') }}" method="POST">
                              @csrf
                              <input type="hidden" value="{{ $subcategory->id }}" name="id">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Category Name: <span class="text-danger">*</span></label>
                                <select class="form-control select2-show-search  @error('category_id') is-invalid @enderror" name="category_id" data-placeholder="Choose one (with searchbox)">
                                  <option label="Choose one"></option>
                                  @foreach ($categories as $row)                             
                                    <option value="{{ $row->id }}" {{ $row->id == $subcategory->category_id ? 'selected':'' }}>{{ $row->category_name }}</option>
                                  @endforeach
                                </select>
                                @error('category_id')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Sub-Category Name: <span class="text-danger">*</span></label>
                                <input type="text" name="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror" id="exampleInputEmail1" value="{{ $subcategory->subcategory_name }}"  aria-describedby="emailHelp" placeholder="Sub-category Name">    
                                @error('subcategory_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror   
                              </div>    
                              <button type="submit" class="btn btn-primary">Update Sub-Category</button>
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

