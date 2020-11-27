<!DOCTYPE html>
<html>
    @php $seo = App\Model\Seo::findOrFail(1); @endphp
    @php $setting = App\Model\Setting::findOrFail(1); @endphp
    @php $contact = App\Model\Contact::findOrFail(1); @endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>আবেদীন স্যানিটারী |@yield('title')</title>
    <meta name="keywords" content="{{ $seo->meta_keywords }}">
    <meta name="description" content="{!! $seo->meta_description !!}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta property="og:title" content="@yield('sharetitle')" />
    <meta property="og:url" content="https://www.abedinsanitary.com" />
    <meta property="og:image" content="@yield('image')"/>
    <meta property="og:description" content="@yield('sharedescp')" />
    <meta property="og:site_name" content="Abedin Sanitary" />
    <!-- bangla font -->
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/siyam-rupali/font.css" rel="stylesheet">
    <!-- english font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/jquery.exzoom.css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/animate.css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('fontend') }}/css/media.css">
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/lib/toastr/toastr.css">
</head>

@yield('body')

    <!--========================= header part start=============================== -->
    <section id="header">
        <div class="container">
            <div class="row mx-0 px-0">
                <div class="col-lg-10 col-sm-8 col-md-8 head1">
                    <div class="header-left">
                        <ul>
                            <li><i class="fa fa-address-book-o" aria-hidden="true"></i>Mobile: {{ $setting->customer_support }}</li>
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>Opening Hour: {{ $setting->opening_hour }}</li>
                            <li><i class="fa fa-map-marker"></i>{{ $setting->address_english }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 px-sm-0 col-md-4 text-right head2">
                    <div class="header-right">
                        <a href="{{ $setting->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $setting->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $setting->instagram_link }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="{{ $setting->linkedin_link }}" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <!-- ===============================header part end ============================-->
    <!-- ===============================headline part start ============================-->
    @php
      $headline = App\Model\Headline::findOrFail(1);  
    @endphp
    @if ($headline->status == 0)
        <div style="background:#e81a46;">
                <marquee behavior="" direction="" style="color: white; padding: 5px;"><h5>
                {{ $headline->notice }}
                </h5></marquee>
        </div>
    @else 
    @endif
    <!-- ===============================headline part end ============================-->
    <!-- ===============================menu part start ============================-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-logo">
                <img src="{{ asset('fontend') }}/image/logo/logo.png" alt="navbar-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link @yield('home')" href="{{ url('/') }}">হোম<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('about')" href="{{ route('about.us') }}">আমাদের সম্পর্কে</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link @yield('our-products')" href="{{ route('our.products') }}">আমাদের পণ্যসমূহ</a>
                    </li>

                    <li class="nav-item">
                        <a href="javascript: void(0);" class="nav-link @yield('delar')"> ডিলার </a>
                        <ul class="sub-menu">
                            @php
                                $delars = App\Model\Delar::latest()->where('status',1)->get();
                            @endphp
                            @foreach ($delars as $row)
                              <li><a href="javascript: void(0);">{{ $row->company_name }}</a>
                                @php
                                    $delcomp = App\Model\Delarservice::latest()->where('company_id',$row->id)->where('status',1)->get();
                                @endphp
                                <ul class="sub-menu1">
                                    @foreach ($delcomp as $item)
                                     <li><a href="{{ url('delar/company-products/'.$item->id.'/'.$item->delar_product_slug) }}">{{ $item->delar_product_name }}</a></li>
                                    @endforeach
                                </ul>
                              </li>
                            @endforeach
                        </ul>

                    </li>                  

                    <li class="nav-item">
                        <a class="nav-link @yield('contact')" href="{{ route('contact') }}">যোগাযোগ</a>
                    </li>
                    <li class="search">
                        <form action="{{ route('search.products') }}" method="post">
                            @csrf
                            <input type="text" name="search" placeholder="পণ্য খুজুন"required >
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- ===============================menu part end ============================-->
    @yield('content')
    <!--  =====================service  part start==========================================-->
    <section id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pro-header">
                        <h3>আমাদের ভিডিওসমূহ</h3>
                    </div>
                </div>
            </div>
            <div class="row serv-top">             
                {{-- <div class="col-lg-12"> --}}
                    {{-- <div class="row feature-top">
                        @foreach ($services as $service)                  
                        <div class="col-lg-4 text-center feature-bottom wow fadeInUp" data-wow-delay="0.2s">
                            <div class="feature-item">
                                <i class="fa fa-slideshare"></i>
                                <h4>{{ $service->service_name }}</h4>
                                <p>{{ $service->service_details }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div> --}}
                {{-- </div> --}}
                <div class="col-lg-4 col-md-5 col-sm-8 ">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wUGePNUrznk" allowfullscreen></iframe>
                    </div>
                </div>


                <div class="col-lg-4 col-md-5 col-sm-8 ">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wUGePNUrznk" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 col-sm-8 ">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wUGePNUrznk" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-8 mt-5">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wUGePNUrznk" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  =====================service   part end==========================================-->
    {{-- <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-8 ">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-8 ">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-lg-4 col-md-5 col-sm-8 ">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div>
            </div>
      </div>
  </div> --}}
    <!-- ================footer  part  start ====================================-->
   
    <section id="contacts">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-8  contact-1 wow fadeInUp">
                    <div class="part1">
                        <h3>About Abedin Sanitary</h3>
                        <p>{{ $contact->address }}</p>
                        <div class="part1-icon">
                            <h6><i class="fa fa-envelope-o" aria-hidden="true"></i>ইমেইল : {{ $contact->email }}</h6>
                            <h6><i class="fa fa-phone" aria-hidden="true"></i>{{ $contact->call }}</h6>
                        </div>
                        <div class="socials-icon">
                            <h5>
                                <span>যোগাযোগ করুন :</span>
                                <a href="{{ $setting->facebook_link }}" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="{{ $setting->twitter_link }}" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>                               
                                <a href="{{ $setting->instagram_link }}" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="{{ $setting->linkedin_link }}" target="_blank">
                                    <i class="fa fa-linkedin"></i>
                                </a>                             
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-4 col-md-3 contacts contact-1 wow fadeInUp" data-wow-delay=".4s">
                    <div class="part1">
                        <h3>Useful links</h3>
                        <div class="part2-icon">
                            <a href="{{ route('about.us') }}"><i class="fa fa-hand-o-right" aria-hidden="true"></i>আমাদের সম্পর্কে </a>
                            <a href="{{ route('our.products') }}"><i class="fa fa-hand-o-right" aria-hidden="true"></i>পণ্যসমূহ </a>
                            <a href="javascript: void(0);"><i class="fa fa-hand-o-right" aria-hidden="true"></i>ডিলার </a>
                            <a href="{{ route('contact') }}"><i class="fa fa-hand-o-right" aria-hidden="true"></i>যোগাযোগ </a>


                        </div>
                    </div>

                </div>
                <div class="col-lg-2 col-sm-5 col-md-4 contacts contact-1  wow fadeInUp" data-wow-delay=".6s">
                    <div class="part1">
                        <h3>Services</h3>
                        <div class="part2-icon">
                            @php
                                $services = App\Model\Service::latest()->get();
                            @endphp
                            @foreach ( $services as $service)
                             <a href="javascript: void(0);">
                                 <i class="fa fa-hand-o-right" aria-hidden="true"></i>{{ $service->service_name }} </a>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-7 col-md-8 contact-1 wow fadeInUp" data-wow-delay=".8s">
                    <div class="part1">
                        <h3>Liked Our Facebook Page</h3>
                    </div>
                    <div class="part4">
                        <div class="part-time">
                            <div class="fb-page" data-href="https://www.facebook.com/ASTPC.BD/" data-tabs="" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false"><blockquote cite="https://www.facebook.com/ASTPC.BD/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ASTPC.BD/">Abedin Sanitary</a></blockquote></div>
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="last-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="last-text text-center">
                        <p>Copyright © {{ Carbon\Carbon::now()->format('Y') }} Abedin Sanitary. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===============================contact  part  end ====================================-->

    <script src="{{ asset('fontend') }}/js/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('fontend') }}/js/wow.min.js"></script>
    <script src="{{ asset('fontend') }}/js/slick.min.js"></script>
    <script src="{{ asset('fontend') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('fontend') }}/js/typed.min.js"></script>
    <script src="{{ asset('fontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('fontend') }}/js/jquery.exzoom.js"></script>
    <script src="{{ asset('fontend') }}/js/custom.js"></script>
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
              
{{-- ===============jquery form validator ==================== --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
         $.validate({
             lang: 'en'
            });
    </script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=225614495464352&autoLogAppEvents=1" nonce="8q7X8Ahv"></script>
</body>

</html>