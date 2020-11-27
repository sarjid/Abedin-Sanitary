@extends('layouts.admin-master')
@section('admin_title') Create New Admin @endsection
@section('admin') active show-sub @endsection
@section('manage-admin') active  @endsection
@section('admin-content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Admin</a>
        <span class="breadcrumb-item active">Update Sub-Admin</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update info</h6>
         
          <form action="{{ url('admin/sub-admin/update/'.$admin->id)}}" method="post">
          	@csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">User Name: <span class="tx-danger">*</span></label>
				  <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Admin name" value="{{ $admin->name }}" >
				  @error('name')
				  <strong class="text-danger">{{ $message }}</strong>
				  @enderror
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email : <span class="tx-danger">*</span></label>
				  <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Admin Email"  value="{{ $admin->email }}" >
				  @error('email')
				  <strong class="text-danger">{{ $message }}</strong>
				  @enderror
                </div>
			  </div><!-- col-4 -->
			  
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Password : <span class="tx-danger">*</span></label>
				  <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
				  @error('password')
				  <strong class="text-danger">{{ $message }}</strong>
				  @enderror
                </div>
              </div><!-- col-4 -->
			  <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Confirm Password : <span class="tx-danger">*</span></label>
				  <input class="form-control @error('confirm_password') is-invalid @enderror" type="password" name="confirm_password" placeholder="Confirm Password">
				  @error('confirm_password')
				  <strong class="text-danger">{{ $message }}</strong>
				  @enderror
                </div>
              </div><!-- col-4 --> 
            </div><!-- row -->
			
            <div class="row">
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="category" value="1" {{ $admin->category == 1 ? 'checked':'' }}>
					  <span>Categoy</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="delar" value="1" {{ $admin->delar == 1 ? 'checked':'' }}>
					  <span>Delar</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="products" value="1" {{ $admin->products == 1 ? 'checked':'' }}>
					  <span>Products</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="employee" value="1" {{ $admin->employee == 1 ? 'checked':'' }}>
					  <span>Employee</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="our_service" value="1" {{ $admin->our_service == 1 ? 'checked':'' }}>
					  <span>Our Service</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="customer_review" value="1" {{ $admin->customer_review == 1 ? 'checked':'' }}>
      					<span>Customer Review</span>
      				</label>
				</div>
				
				<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="about_us" value="1" {{ $admin->about_us == 1 ? 'checked':'' }}>
      					<span>About Us</span>
      				</label>
				</div>
				<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="contact" value="1" {{ $admin->contact == 1 ? 'checked':'' }}>
      					<span>Contact</span>
      				</label>
				</div>
				<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="message" value="1" {{ $admin->message == 1 ? 'checked':'' }}>
      					<span>Message</span>
      				</label>
				</div>
				
				<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="settings" value="1" {{ $admin->settings == 1 ? 'checked':'' }}>
      					<span>Settings</span>
      				</label>
                </div>

                <div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="admin_create" value="1" {{ $admin->admin_create == 1 ? 'checked':'' }}>
      					  <span>Create Admin</span>
      				</label>
                </div>
            </div>

            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->



@endsection
