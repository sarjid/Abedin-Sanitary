@extends('layouts.admin-master')
@section('employee') active show-sub @endsection
@section('add-employee') active @endsection
@section('admin_title') employee Add @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="#">Admin</a>
          <span class="breadcrumb-item active">Add New Employee</span>
        </nav>
        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
              <h6 class="card-body-title">Add New Employee </h6>
              <form action="{{ route('store.employee') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row row-sm">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee Name(Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="employee_name" class="form-control @error('employee_name') is-invalid @enderror" id="exampleInputEmail1" value=""  aria-describedby="emailHelp" placeholder="Employee Name Bangla"> 
                                @error('employee_name')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                        </div>  
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Employee Position(Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" id="exampleInputEmail1" value=""  aria-describedby="emailHelp" placeholder="Employee position"> 
                                @error('position')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                        </div>  

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook link: <span class="text-danger">*</span></label>
                                <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" id="exampleInputEmail1" value=""  aria-describedby="emailHelp" placeholder="facebook profile link"> 
                                <small class="text-danger">লিংক দিতে না চাইলে হ্যাস( # ) ব্যবহার করুন</small><br>
                                @error('facebook')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                        </div>  

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Twitter link: <span class="text-danger">*</span></label>
                                <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" id="exampleInputEmail1" value=""  aria-describedby="emailHelp" placeholder="twitter profile link">
                                <small class="text-danger">লিংক দিতে না চাইলে হ্যাস( # ) ব্যবহার করুন</small><br>
                                @error('twitter')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>      
                        </div>  

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Instagram link: <span class="text-danger">*</span></label>
                                <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" id="exampleInputEmail1" value=""  aria-describedby="emailHelp" placeholder="instagram profile link"> 
                                <small class="text-danger">লিংক দিতে না চাইলে হ্যাস( # ) ব্যবহার করুন</small><br>
                                @error('instagram')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                        </div>  

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Upload New Image: <span class="text-danger">*</span></label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('image') }}"  aria-describedby="emailHelp" onchange="readURL2(this);" > 
                                <img src="#" id="three" >
                                <small class="text-danger">Image Size Must Be 300*300 pixel</small> <br>
                                @error('image')
                                <strong class="text-danger">{{$message}}</strong>
                                @enderror    
                            </div>
                        </div> 

                  
                            
                </div>
              
              <div class="form-layout-footer mt-3">
                <button class="btn btn-info mg-r-5" type="submit" style="cursor: pointer;">Add Employee</button>
              </div><!-- form-layout-footer -->
            </form>
            </div>
            </div><!-- row -->         
          </div><!-- sl-pagebody -->         
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->      
@endsection

