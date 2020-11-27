@extends('layouts.admin-master')
@section('dashboard') active @endsection
@section('admin_title') Dashboard @endsection
@section('admin-content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
          <a class="breadcrumb-item" href="index.html">Portfolio</a>
          <span class="breadcrumb-item active">Dashboard</span>
        </nav>

        <div class="sl-pagebody">

          <div class="row row-sm">
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0 mt-2">
              <div class="card pd-20 bg-sl-primary">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h4 class=" mg-b-0 tx-spacing-1 tx-white">{{Carbon\Carbon::now()->format('D') }},
                    {{Carbon\Carbon::now()->format('d F Y') }}
                 </h4>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                 
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold" id="curr_time"></h3>
                </div><!-- card-body -->
                <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                 
                </div><!-- -->
              </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0 mt-2">
              <div class="card pd-20 bg-info">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Products</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($products) }}</h3>
                </div><!-- card-body -->            
              </div><!-- card -->
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0 mt-2">
              <div class="card pd-20 bg-purple">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Category</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($category) }}</h3>
                </div><!-- card-body -->               
              </div><!-- card -->
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0 mt-2">
              <div class="card pd-20 bg-purple">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Sub Category</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($subcat) }}</h3>
                </div><!-- card-body -->               
              </div><!-- card -->
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0 mt-2">
              <div class="card pd-20 bg-sl-primary">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Delars</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($delar) }}</h3>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0 mt-2">
              <div class="card pd-20 bg-sl-primary">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Under Delars Products</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($delar_p) }}</h3>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-3 -->
            
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0 mt-2">
              <div class="card pd-20 bg-info">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Comment</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($comment) }}</h3>
                </div><!-- card-body -->            
              </div><!-- card -->
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0 mt-2">
              <div class="card pd-20 bg-info">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Sub Admin</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($sub_admin) }}</h3>
                </div><!-- card-body -->            
              </div><!-- card -->
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0 mt-2">
              <div class="card pd-20 bg-purple">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Message</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($message) }}</h3>
                </div><!-- card-body -->               
              </div><!-- card -->
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0 mt-2">
              <div class="card pd-20 bg-sl-primary">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">New Message</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($new_msg) }}</h3>
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0 mt-2">
              <div class="card pd-20 bg-info">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Trash Message</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($trash) }}</h3>
                </div><!-- card-body -->            
              </div><!-- card -->
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0 mt-2">
              <div class="card pd-20 bg-info">
                <div class="d-flex justify-content-between align-items-center mg-b-10">
                  <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Service</h6>
                  <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                </div><!-- card-header -->
                <div class="d-flex align-items-center justify-content-between">
                  <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                  <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{ count($service) }}</h3>
                </div><!-- card-body -->            
              </div><!-- card -->
            </div><!-- col-3 -->

          </div><!-- row -->       
        </div><!-- sl-pagebody -->        
      </div><!-- sl-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->
      <script>
         
        var div = document.getElementById('curr_time'); 
           function time() {
           div.innerHTML = "";
           var d = new Date();
           var t = d.toLocaleTimeString();
           div.innerHTML = t;
           }

       setInterval(time, 1000);

</script>
@endsection
