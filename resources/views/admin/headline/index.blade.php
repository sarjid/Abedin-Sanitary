@extends('layouts.admin-master')
@section('headline') active @endsection
@section('admin_title') headline @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item">Headline</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
                <div class="col-md-8 m-auto">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body col-lg-12">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Headline Settings</h4>
                                    @if($headline->status == 0)
                                 <small class="text-success">Now Notice are Active</small>
                             @else
                                 <small class="text-danger">Now Notice are Deactive</small>
                              @endif

                                    @if($headline->status == 0)
                                    <a href="{{ url('admin/headline/deactive') }}" style="float: right" class="btn btn-danger">Deactive</a>
                                    @else
                                    <a href="{{ url('admin/headline/active') }}" style="float: right" class="btn btn-success">Active</a>
                                    @endif
                                  </div>
            
                                  <div class="modal-body">
                                     <form action="{{ url('admin/headline/update') }}" method="Post">
                                         @csrf
                                       <div class="form-group">
                                         <label for="exampleInputEmail1">Your Notice</label>
                                         <textarea type="text" class="form-control " aria-describedby="emailHelp" name="notice" required="" cols="30" rows="10">{{ $headline->notice }}</textarea>
                                       </div>
                                       <button type="submit" class="btn btn-success btn-block">Update</button>
                                     </form>
                                  </div>
                                </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
            
                </div>
            </div>
        </div>
    </div>
@endsection