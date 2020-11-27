@extends('layouts.fontend-master')
@section('home') active @endsection
@section('title') হোম @endsection
@section('body') <body class="home-page"> @endsection
@section('content')
    
<!-- ==========================banner part start ============================-->
    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 pr-lg-3 cat-top wow fadeInUp">
                    <div class="category-list">
                        <ul>
                            <li class="cat1"><i class="fa fa-bars "></i>ক্যাটাগরিসমুহ</li>
                        @foreach ($categories as $category)
                            <li><a href="javascript: void(0);">{{ $category->category_name }}</a><i class="fa fa-angle-right list"></i>
                                @php
                                     $subcategories = App\Model\Subcategory::latest()->where('category_id',$category->id)->where('status',1)->get();
                                @endphp
                                <ul>
                                    @foreach ($subcategories as $subcat)
                                    <li><a href="{{ url('subcategory/products/'.$subcat->id.'/'.$subcat->subcategory_slug) }}">{{ $subcat->subcategory_name }}</a></li>                                           
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        </ul>
                    </div>

                    {{-- eid banner start --}}
                    {{-- <div class="category-list">
                        <ul >
                        <img src="{{ asset('fontend/image/eid/img.gif') }}"  width="250px;" alt="">
                        </ul>
                    </div> --}}
                    {{-- eid banner end  --}}
                </div>

                


                <div class="col-lg-9 banner-top  px-lg-0">
                    <i class="fa fa-angle-left banner-left1"></i>
                    <i class="fa fa-angle-right banner-right1"></i>
                    <div class="banner-slider">
                        @foreach ($main_sliders as $slider)                    
                        <div class="banner-item">
                            <div class="banner-img">
                                <img src="{{ asset('fontend') }}/image/ban33.jpg" alt="img" class="img-fluid">
                                <div class="ban-overlay">

                                    <div class="ban-text ">
                                        <h2 class="animated fadeInUp " style="animation-delay:1s " ><span>Welcome </span> to our best sanitary  <span>product </span>Shop</h2>

                                        <div class="banner-btn animated fadeInUp" style="animation-delay:1s ">

                                            <a href="{{ route('our.products') }}" style="border-radius:5px;">পণ্য দেখুন</a>
                                        </div>
                                    </div>

                                    <div class="ban-img wow slideInRight" >
                                        <img src={{ asset($slider->image_one) }} alt="img"  class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- ==========================banner part end ============================-->

    <!-- ==========================product part start ============================-->
    <section id="product">
        <div class="container">
            <div class="row p-bottom">
            	 <i class="fa fa-arrow-left left1"></i>
                 <i class="fa fa-arrow-right right1"></i>
                <div class="col-lg-12">
                    <div class="pro-header">
                        <h3>আমাদের পণ্যসমূহ</h3>
                    </div>
                </div>
            </div>
            <div class="container product-slider">
                <div class="row px-0 mx-0">
                    <div class="col-lg-12 px-0 mx-0">
                        <!-- ====part1 ========-->
                        <div class="row px-0 mx-0 mt-1">
                        @foreach ($products as $product)                   
                            <div class="col-lg-3 pro-top wow fadeInUp dealer-effect mb-3 " data-wow-delay="0.2s">
                                <a href="{{ url('products/details/'.$product->id.'/'.$product->product_slug) }}">
                                    <div class="product-item">
                                        <div class="pro-img">
                                            <img src="{{ asset($product->image_one) }}" alt="img" class="img-fluid">
                                            <div class="pro-overlay">
                                            </div>
                                        </div>
                                        <div class="pro-name">
                                            @if ($product->company_id == NULL)
                                            <small style="color: black;">Category: 
                                                {{ $product->category->category_name }}</small>
                                            @else
                                            <small style="color: black;">Brand: 
                                                {{ $product->company->company_name }}</small>
                                            @endif
                                            <p><strong>{{ $product->product_name }}</strong></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        </div>

                    </div>
                </div>
               
            </div>
        </div>
    </section>


    <!-- ==========================product part end ============================-->





   <!--  =====================team  part start=====================================-->
   <section id="team">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pro-header">
                    <h3>দক্ষ কারিগর</h3>
                </div>
            </div>
        </div>
        <div class="row team-top px-0 mx-0">
            @foreach ($employees as $employee)         
            <div class="col-lg-3 team-padding wow fadeInUp  mt-3" data-wow-delay="0.1s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="{{ asset($employee->image) }}" alt="team-img" class="img-fluid">
                    </div>
                    <div class="team-overlay">
                        <div class="team-text">
                            <div class="social-icon">
                                <a href="{{ $employee->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $employee->twitter }}" target="_blank"> <i class="fa fa-twitter"></i></a>
                                <a href="{{ $employee->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>

                    </div>
                    <div class="team-txt">
                        <h5 style="color: #e81a46">{{ $employee->employee_name }}</h5>
                        <p class="mt-1">{{ $employee->position }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!--  =====================team  part end==========================================-->


    <!--  =====================best  product part start==========================================-->
    <section id="project-product">



        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pro-header">
                        <h3>পণ্যের ক্যাটেগরি</h3>
                        <!-- <i class="fa fa-arrow-left p-left1"></i> 
         	         <i class="fa fa-arrow-right p-right1"></i> -->
                    </div>
                </div>
            </div>
            <div class="row mx-0 px-0">
                <div class="col-lg-12 mx-0 px-0  col-md-12 project-1">
                    <div class="project-left">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All</a>
                            </li>
                            @foreach ($categories as $category)
                            <li class="nav-item mt-1">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#{{ $category->id }}" role="tab" aria-controls="profile" aria-selected="false">{{ $category->category_name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                

                <div class="col-lg-12  col-md-12 ">
                    <div class="project-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <!-- =========part1  ==============-->
                                    @foreach ($cat_products as $product)
                                        <div class="col-lg-3 text-center pro-padding pro-item-top mix office">
                                            <a href="{{ url('products/details/'.$product->id.'/'.$product->product_slug) }}">
                                                <div class="project-item">
                                                    <div class="best-product-img">
                                                        <img src="{{ asset($product->image_one) }}" alt="worl-img" class="img-fluid">
                                                        <div class="pro-overlay">

                                                        </div>
                                                    </div>
                                                    <div class="b-project-text">
                                                        @if ($product->company_id == NULL)
                                                        <small style="color: black;">Category: 
                                                            {{ $product->category->category_name }}</small>
                                                        @else
                                                        <small style="color: black;">Brand: 
                                                            {{ $product->company->company_name }}</small>
                                                        @endif
                                                        <p><strong>{{ $product->product_name }}</strong></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @foreach ($categories as $category)
                            <!--=============== part2 ============= -->
                            <div class="tab-pane fade" id="{{ $category->id }}" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row mx-0 px-0">
                                    @php
                                        $catbyproducts = App\Model\Product::latest()->where('category_id',$category->id)->where('status',1)->limit(24)->get();
                                    @endphp
                                    @foreach ($catbyproducts as $product)
                                        <div class="col-lg-3 text-center pro-padding pro-item-top mix office">
                                            <a href="{{ url('products/details/'.$product->id.'/'.$product->product_slug) }}">
                                                <div class="project-item">
                                                    <div class="best-product-img">
                                                        <img src="{{ $product->image_one }}" alt="worl-img" class="img-fluid">
                                                        <div class="pro-overlay">

                                                        </div>
                                                    </div>
                                                    <div class="b-project-text">
                                                        @if ($product->company_id == NULL)
                                                        <small style="color: black;">Category: 
                                                            {{ $product->category->category_name }}</small>
                                                        @else
                                                        <small style="color: black;">Brand: 
                                                            {{ $product->company->company_name }}</small>
                                                        @endif
                                                        <p><strong>{{ $product->product_name }}</strong></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        @endforeach



                        </div>
                    </div>
                </div>

               
            </div>
        </div>


    </section>

    <!--  =====================best product  part end==========================================-->



    <!--  =====================service  part start==========================================-->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pro-header">
                        <h3>আমাদের সেবাসমূহ</h3>
                    </div>
                </div>
            </div>
            <div class="row serv-top">             
                <div class="col-lg-12">
                    <div class="row feature-top">
                        @foreach ($services as $service)                  
                        <div class="col-lg-4 text-center feature-bottom wow fadeInUp" data-wow-delay="0.2s">
                            <div class="feature-item">
                                <i class="fa fa-slideshare"></i>
                                <h4>{{ $service->service_name }}</h4>
                                <p>{{ $service->service_details }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  =====================service   part end==========================================-->

    <!--  =====================testimonial   part start=====================================-->
    <section id="testimonial">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="service-header test-header">
                        <h3><i class="fa fa-slideshare"></i> কাস্টমার প্রতিক্রিয়া </h3>
                    </div>
                </div>
            </div>
            <div class="row test-slider">
                @foreach ($reviews as $review)            
                    <div class="col-lg-6 testi-hover">
                        <div class="test-item">
                            <div class="test-text">
                                <p>{{ $review->customer_review }}</p>
                                <div class="test-icon">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 customer">
                                <div class="test-detail">
                                    <div class="test-img">
                                        <img src="{{ asset('fontend') }}/image/hh.png" alt="tst-img" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 px-lg-0 testimonial-text">
                                <h4>{{ $review->customer_name }}</h4>
                                <p>কাস্টমার</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!--  =====================testimonial   part end==========================================--
        ==================== fb chat plugin ================================================
     Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your Chat Plugin code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="253751045559656"
        theme_color="#e81a46"
        logged_in_greeting="Hello.. কিভাবে সাহায্য করতে পারি ?"
        logged_out_greeting="Hello.. কিভাবে সাহায্য করতে পারি ?">
      </div>
@endsection
