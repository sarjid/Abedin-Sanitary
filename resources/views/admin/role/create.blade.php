@extends('layouts.admin-master')
@section('admin_title') Create New Admin @endsection
@section('admin') active show-sub @endsection
@section('create-admin') active  @endsection
@section('admin-content')

    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Admin</a>
        <span class="breadcrumb-item active">Create Admins</span>
      </nav>
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Admin Create </h6>
         
          <form action="{{route('store.admin')}}" method="POST">
          	@csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">User Name: <span class="tx-danger">*</span></label>
				  <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="User name" value="{{ old('name') }}" >
				  @error('name')
				  <strong class="text-danger">{{ $message }}</strong>
				  @enderror
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email : <span class="tx-danger">*</span></label>
				  <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" >
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
			<small class="text-danger">আপনি যে যে অপশুলো তাকে দেখতে দিতে চান সেগুলোতে টিক চিহ্ন দিন </small>
            <div class="row">
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="category" value="1">
					  <span>Categoy</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="delar" value="1">
					  <span>Delar</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="products" value="1">
					  <span>Products</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="employee" value="1">
					  <span>Employee</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
					  <input type="checkbox" name="our_service" value="1">
					  <span>Our Service</span>
					</label>
            	</div>
            	<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="customer_review" value="1">
      					<span>Customer Review</span>
      				</label>
				</div>
				
				<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="about_us" value="1">
      					<span>About Us</span>
      				</label>
				</div>
				<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="contact" value="1">
      					<span>Contact</span>
      				</label>
				</div>
				<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="message" value="1">
      					<span>Message</span>
      				</label>
				</div>
				
				<div class="col-lg-4">
            		<label class="ckbox">
      					<input type="checkbox" name="settings" value="1">
      					<span>Settings</span>
      				</label>
                </div>

                <div class="col-lg-4">
            		<label class="ckbox">
      					  <input type="checkbox" name="admin_create" value="1">
      					  <span>Create Admin</span>
      					</label>
                </div>

            </div>

            <br>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Create</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->



@endsection
