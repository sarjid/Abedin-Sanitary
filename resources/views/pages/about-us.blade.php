@extends('layouts.fontend-master')
@section('about') active @endsection
@section('title') আমাদের সম্পর্কে @endsection
@section('body') 
<body id="otherpage" class="about-page">
 @endsection
@section('content')  
    
    <!--  =====================banner  part start=================================-->
    <section id="breadcumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center wow fadeInUp">
                    <div class="bread-text">
                        <h2>আমরা কে ?</h2>
                        <h4><a href="{{ url('/') }}">হোম</a><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>আমাদের সম্পর্কে</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  =====================banner  part end===================================-->

    <!--  =====================about us  part start===================================-->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pro-header wow fadeInUp">
                        <h3>আমাদের সম্পর্কে</h3>
                    </div>
                    <div class="about-text wow fadeInUp" data-wow-delay=".4s">
                        <p>{!! $about->about_us !!}</p>

                    </div>
                </div>
            </div>
            <div class="row about-info">
                <div class="col-lg-6 wow slideInLeft">
                    <div class="about-slider">
                        @foreach ($products_slide as $product)
                        <div class="about-item">
                            <img src="{{ $product->image_two }}" alt="img" class="img-fluid">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 wow slideInRight" data-wow-delay="0.8s">
                    <div class="pro-header">
                        <h3>আমরা কি কি করি ? </h3>
                        <div class="about-left">
                            <p>{!! $about->what_we_do !!}</p>

                        </div>

                    </div>
                </div>
            </div>
            <div class="row about-img-top">
                <div class="col-lg-12 about-bottom">
                    <div class="pro-header">
                        <h3>আরো পণ্যসমূহ </h3>
                    </div>
                </div>
            </div>
            <div class="row about-slider2">
                @foreach ($more_products as $product)           
                <div class="col-lg-3  text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="about1-item">
                        <a href="{{ url('products/details/'.$product->id.'/'.$product->product_slug) }}">
                            <div class="about-img">
                                <img src="{{ $product->image_one }}" alt="img" class="img-fluid">
                            </div>
                            <div class="about-slider-text">
                                @if ($product->company_id == NULL)
                                    <small style="color: black;">Category: 
                                    {{ $product->category->category_name }}</small>
                                @else
                                    <small style="color: black;">Brand: 
                                    {{ $product->company->company_name }}</small>
                                @endif
                                <p><strong>{{ $product->product_name }}</strong></p>
                            </div>
                        </a>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--  =====================about us  part end===================================-->
    <!--  =====================back-top  part start=========================================-->
    <a href="#" class="back-top">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <!--  =====================back-top  part end=========================================-->
@endsection