<!DOCTYPE html>
<html lang="en">
  <head>
    @php
    $messages = App\Model\Message::where('status',1)->latest()->get();
    @endphp
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Admin |@yield('admin_title')</title>

    <!-- vendor css -->
    <link href="{{ asset('backend') }}/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/lib/toastr/toastr.css">
    <link href="{{ asset('backend') }}/lib/medium-editor/medium-editor.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/medium-editor/default.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/lib/summernote/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend')}}/lib/bootstrap-tagsinput.css" crossorigin="anonymous">
    <link href="{{ asset('backend') }}/lib/spectrum/spectrum.css" rel="stylesheet">
    <script src='{{ asset('backend') }}/lib/messenger.js'></script>
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/css/starlight.css">
  </head>

  <body>

    @guest
    @else
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo">
      <a href="{{ url('home') }}">
        {{-- <img src="{{ asset('backend/img/logoo.jpg') }}"  alt="Abedin Senitery"> --}}
        <h4><strong>Abedin Sanitary</strong></h4>
       </a>
     
    </div>
    <div class="sl-sideleft">
    
  
      <div class="sl-sideleft-menu">
      
        <a href="{{ url('/') }}" target="_blank" class="sl-menu-link ">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Visit Site</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        
        <a href="{{ url('admin/headline') }}" class="sl-menu-link @yield('headline')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Headline</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <!-- ================ Category ======  -->
        @if (Auth::user()->category !== 1)
        @else       
        <a href="#" class="sl-menu-link @yield('categories')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
       
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item "><a href="{{ route('admin.category') }}" class="nav-link @yield('category')">Category</a></li> 
          <li class="nav-item"><a href="{{ route('admin.sub.category') }}" class="nav-link @yield('sub-category')">Sub-Category</a></li> 
        </ul>
        @endif

        @if (Auth::user()->delar !== 1)
        @else   
        <a href="#" class="sl-menu-link @yield('delars')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Delar</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item "><a href="{{ route('admin.company') }}" class="nav-link @yield('company')">Delar Company Add </a></li> 
          <li class="nav-item"><a href="{{ route('admin.company.products') }}" class="nav-link @yield('company-products')">Delar Products</a></li>
        </ul>
        @endif

        @if (Auth::user()->products !== 1)
        @else   
        <a href="#" class="sl-menu-link @yield('products')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item "><a href="{{ route('admin.add.products') }}" class="nav-link @yield('add-products')">Add Products</a></li> 
          <li class="nav-item"><a href="{{ route('admin.manage.products') }}" class="nav-link @yield('manage-products')">Manage Products</a></li>
          <li class="nav-item"><a href="{{ route('admin.product.comments') }}" class="nav-link @yield('comments')">Product Comments</a></li>
        </ul>
        @endif

        @if (Auth::user()->employee !== 1)
        @else   
        <a href="#" class="sl-menu-link @yield('employee')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Employee</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item "><a href="{{ route('admin.employee') }}" class="nav-link @yield('add-employee')">Add Employee</a></li> 
          <li class="nav-item"><a href="{{ route('admin.manage.employee') }}" class="nav-link @yield('manage-employee')">Manage Employee</a></li>
        </ul>
        @endif

        @if (Auth::user()->our_service !== 1)
        @else   
        <a href="{{ route('admin.services') }}" class="sl-menu-link @yield('services')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Our Services</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        @endif
        @if (Auth::user()->customer_review !== 1)
        @else   
        <a href="{{ route('admin.review') }}" class="sl-menu-link @yield('review')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Customer Review</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
       @endif
       @if (Auth::user()->about_us !== 1)
       @else   
        <a href="{{ route('admin.about.us') }}" class="sl-menu-link @yield('about-us')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">About Us</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      @endif
      @if (Auth::user()->contact !== 1)
      @else   
        <a href="{{ route('admin.contact') }}" class="sl-menu-link @yield('contact')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Contact</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      @endif

      @if (Auth::user()->message !== 1)
      @else   
        <a href="#" class="sl-menu-link @yield('message')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Messages</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item "><a href="{{ route('admin-contact-message') }}" class="nav-link @yield('new-message')">New-Message</a></li> 
          <li class="nav-item"><a href="{{ route('admin-trash-list') }}" class="nav-link @yield('trash-list')">Trash List</a></li>          
        </ul>
       @endif
       @if (Auth::user()->settings !== 1)
       @else   
        <a href="#" class="sl-menu-link @yield('setting')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Settings</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item "><a href="{{ route('admin.setting') }}" class="nav-link @yield('site-setting')">Site-Setting</a></li> 
          <li class="nav-item"><a href="{{ route('admin-seo-setting') }}" class="nav-link @yield('seo-setting')">Seo Setting</a></li>          
        </ul>
        @endif
        @if (Auth::user()->admin_create !== 1)
        @else   
        <a href="#" class="sl-menu-link @yield('admin')">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Create New Admin</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item "><a href="{{ route('admin.create') }}" class="nav-link @yield('create-admin')">Create</a></li> 
          <li class="nav-item"><a href="{{ route('admin-manage') }}" class="nav-link @yield('manage-admin')">Manage-Admin</a></li>          
        </ul>
        @endif
        

       
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{ Auth::user()->name }}</span>
              <img src="{{ asset(Auth::user()->image) }}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{ route('admin.my.profile') }}"><i class="icon ion-ios-person-outline"></i> My Profile</a></li>
                <li>
                  <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Log Out</a></li>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        @if (Auth::user()->message !== 1)
        @else
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            
            <i class='fab fa-facebook-messenger' style='font-size:28px;color:white;'>{{ count($messages) }}</i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
        @endif
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">{{ count($messages) }} New Messages</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            @foreach ($messages as $msg)         
            <a href="{{ url('admin/contact/message-view/'.$msg->id) }}" class="media-list-link">
              <div class="media">
                <img src="{{ asset('backend') }}/img/comment.png" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">{{ $msg->name }}</p>
                  <span class="d-block tx-11 tx-gray-500">{{ $msg->created_at->diffForHumans() }}</span>
                  <p class="tx-13 mg-t-10 mg-b-0">{{ $msg->subject }}</p>
                </div>
              </div><!-- media -->
            </a>
            @endforeach
            <!-- loop ends here -->
          </div><!-- media-list -->
          <div class="pd-15">
            <a href="{{ route('admin-contact-message') }}" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
    @endguest

    @yield('admin-content')

    <script src="{{ asset('backend') }}/lib/jquery/jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/popper.js/popper.js"></script>
    <script src="{{ asset('backend') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{asset('backend')}}/lib/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/lib/showimg.js"></script>
    <script src="{{ asset('backend') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ asset('backend') }}/lib/highlightjs/highlight.pack.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('backend') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ asset('backend') }}/lib/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/lib/spectrum/spectrum.js"></script>
    <script src="{{ asset('backend') }}/lib/spectrum/code.js"></script>
    <script src="{{ asset('backend') }}/lib/dataCode.js"></script>
    <script src="{{ asset('backend')}}/lib/summernote/summernote-bs4.min.js"></script>
    <script src="{{ asset('backend')}}/lib/medium-editor/medium-editor.js"></script>
    <script src="{{ asset('backend')}}/lib/summernote/summernote-code.js"></script>
    <script src="{{ asset('backend') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{ asset('backend') }}/lib/d3/d3.js"></script>
    <script src="{{ asset('backend') }}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{ asset('backend') }}/lib/chart.js/Chart.js"></script>
    <script src="{{ asset('backend') }}/lib/Flot/jquery.flot.js"></script>
    <script src="{{ asset('backend') }}/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{ asset('backend') }}/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{ asset('backend') }}/lib/flot-spline/jquery.flot.spline.js"></script>
    <script src="{{ asset('backend') }}/js/starlight.js"></script>
    <script src="{{ asset('backend') }}/js/ResizeSensor.js"></script>
    <script src="{{ asset('backend') }}/js/dashboard.js"></script>
    <script src="{{ asset('backend') }}/js/sweetalert2@8.js"></script>
    <script src="{{ asset('backend')}}/lib/sweetalert/sweetalert.min.js"></script>
    <script src="{{ asset('backend')}}/lib/sweetalert/sweetalertCode.js"></script>
    <script src="{{ asset('backend')}}/lib/summernote/summernote-bs4.min.js"></script>
    <script src="{{ asset('backend')}}/lib/medium-editor/medium-editor.js"></script>
    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>

    <script type="text/javascript" src="{{ asset('backend') }}/lib/toastr/toastr.min.js"></script>
    <script>
      @if(Session::has('message'))
        var type ="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info(" {{Session::get('message')}} ");
                break;

            case 'success':
                toastr.success(" {{Session::get('message')}} ");
                break;
                
            case 'warning':
                toastr.warning(" {{Session::get('message')}} ");
                break;

            case 'error':
                toastr.error(" {{Session::get('message')}} ");
                break;
        }
    @endif
    </script>
    
   
  </body>
</html>
