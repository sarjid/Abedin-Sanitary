@extends('layouts.admin-master')
@section('admin_title') My Profile @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item active">Profile</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
           <div div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">Update profile
                </div>
                <div class="card-body">
                      <form action="{{ route('update.admin.profile') }}" method="POST" enctype="multipart/form-data">
                          @csrf

                      <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->name }}">

                        @error('name')
                      <span class="text-danger">{{$message}}</span>
                        @enderror

                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">

                        @error('email')
                      <span class="text-danger">{{$message}}</span>
                        @enderror

                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Profile Picture</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        @error('image')
                      <span class="text-danger">{{$message}}</span>
                        @enderror

                      </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Update Data</button>
                    </div>
                  
                </form>

                </div>
            </div>
        </div>

        <div class="col-md-4 mt-1">
          <div class="card " style="width: 18rem;">
            <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;" width="100%;" alt="Card image cap">
            <div class="card-body">
            <ul class="list-group list-group-flush text-center">
              <a href="{{ route('admin.my.profile') }}" class="btn btn-success btn-sm btn-block">Home</a>
            <a href="{{ route('change.password') }}" class="btn btn-success btn-sm btn-block">Change Password</a>
           
              <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Log Out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </ul>
              </div>                
          </div>
        </div>
    </div>
</div>
@endsection
