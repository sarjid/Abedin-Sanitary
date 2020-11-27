@extends('layouts.admin-master')
@section('admin_title') Change Password @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item active">Profile</span>
        </nav>
        <div class="sl-pagebody">
          <div class="row row-sm">
         
            <div class="col-md-8">
              <div class="card">
                  <div class="card-header bg-danger text-white">Change Password
                  </div> 
                  <div class="card-body">                  
                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Old Passowrd</label>
                          <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" old_password">
                          @if(session('error'))               
                           <strong class="text-danger">{{session('error')}}</strong>                                         
                          @endif
                          @error('old_password')
                            <span class="text-danger">{{$message}}</span>
                          @enderror  
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputEmail1">New Password</label>
                          <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="new_password">
                          @error('new_password')
                          <span class="text-danger">{{$message}}</span>
                          @enderror 
                        </div> 
                        <div class="form-group">
                          <label for="exampleInputEmail1">Confirm Password</label>
                          <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="confirm_password">
                          @if(session('danger'))          
                           <strong class="text-danger">{{session('danger')}}</strong>                                           
                         @endif 
                          @error('confirm_password')
                        <span class="text-danger">{{$message}}</span>
                          @enderror  
                        </div> 
                      <div class="form-group">
                          <button type="submit" class="btn btn-danger">Update Password</button>
                      </div>                    
                  </form> 
                  </div>
              </div>
          </div>
        <div class="col-md-4 mt-1">
            <div class="card " style="width: 18rem;">
                <img class="card-img-top" style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;" width="100%;" alt="Card image cap">
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
