@extends('layouts.fontend-master')
@section('contact') active @endsection
@section('title') যোগাযোগ @endsection
@section('body') 
<body id="otherpage" class="contact-page">
 @endsection
@section('content')  
        <!--  =====================banner  part start=================================-->
        <section id="breadcumbs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="bread-text">
                            <h2>যোগাযোগ করুন</h2>
                            <h4><a href="index.html">হোম</a><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>যোগাযোগ</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  =====================banner  part end===================================-->
    
        <!-- =====================contact-details part start ==================================-->
        <section id="address">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 text-center wow fadeInUp" data-wow-delay="0.3s">
                        <div class="add-1">
                            <div class="add-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <h4>যোগাযোগ এর স্থান</h4>
                            <p>{{ $contact->address }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center wow fadeInUp" data-wow-delay="0.5s">
                        <div class="add-1">
                            <div class="add-icon">
                                <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                            </div>
                            <h4>কল করুন</h4>
                            <p class="text-center">{{ $contact->call }}</p>                                          
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center wow fadeInUp" data-wow-delay="0.7s">
                        <div class="add-1">
                            <div class="add-icon">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                            </div>
                            <h4>মেইল করুন </h4>
                            <p>{{ $contact->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =====================contact-details part end ==================================-->
    
        <!--  ===================== contact form  part start=========================================-->
        <section id="form">
            <div class="container">
                <div class="row">
    
                    <div class="col-lg-9 m-auto col-md-12 wow slideInLeft" data-wow-delay=".5s">
                        <div class="service-header test-header">
                            <h3><i class="fa fa-home"></i> তথ্য সাবমিট করুন </h3>
                        </div>
                        <form action="{{ url('contact/message-send') }}" method="POST">
                            @csrf
                            <div class="row form-top">
                                <div class="col-lg-6 col-md-6 ">
                                    <div class="field">
                                        <p>নাম </p>
                                        <input type="text" name="name" value="{{ old('name') }}" placeholder="আপনার নাম লিখুন *" id="fname" >
                                        <div class="error" id="fname_err" ></div>
                                        @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                    </div>   
                                    
                                </div>
                                <div class="col-lg-6 col-md-6 ">
                                    <div class="field">
                                        <p>ইমেইল </p>
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="ইমেইল *" id="email">
                                        <div class="error" id="email_err"></div>
                                        @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6  col-md-6">
                                    <div class="field">
                                        <p>মোবাইল </p>
                                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="মোবাইল নাম্বার *" id="phone">
                                        <div class="error" id="phone_err"></div>
                                        @error('phone')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                  
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="field">
                                        <p>বিষয় </p>
                                        <input type="text" name="subject" value="{{ old('subject') }}" placeholder="বিষয়">
                                        @error('subject')
                                        <strong class="text-danger">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="field">
                                        <p>বার্তা </p>
                                        <textarea placeholder="বার্তা লিখুন *" value="{{ old('message') }}" name="message" ></textarea>
                                        @error('message')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                    </div>
                                    
                                </div>
    
                                <div class="col-lg-12">
                                    <div class="form-btn">
                                        <button type="submit" >send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        </section>
        <!--  ===================== contact form  part end=========================================-->
    
        <!-- ============map part start====================== -->
        <section id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d23644.57530054683!2d90.4046187928504!3d23.719729014173947!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb342cba30bfb41f9!2z4KaG4Kas4KeH4Kam4KeA4KaoIOCmuOCnh-CmqOCmv-Cmn-CmvuCmsOCngA!5e0!3m2!1sbn!2sbd!4v1592464499254!5m2!1sbn!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </section>
        <!-- ============map part end====================== -->
        <!--  =====================back-top  part start=========================================-->
    <a href="#" class="back-top">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <!--  =====================back-top  part end=========================================-->
@endsection