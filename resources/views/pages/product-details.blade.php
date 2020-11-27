@extends('layouts.fontend-master')
@section('title') {{ $product->product_slug }} @endsection
@section('image'){{ asset($product->image_one) }}@endsection
@section('sharetitle'){{ $product->product_name }}@endsection
@section('sharedescp'){{ $product->product_name }}@endsection
@section('body') 
<body id="otherpage" class="product-page">
 @endsection
@section('content')  
    <!--  =====================banner  part start=================================-->
    <section id="breadcumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center wow fadeInUp">
                    <div class="bread-text">
                        <h2>পণ্যের বিস্তারিত </h2>
                        <h4><a href="{{ url('/') }}">হোম</a><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>{{ $product->product_slug }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  =====================banner part end================================================-->
  <!--  =====================product details page  part start===================================-->
  <section id="product-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 details-bottom">
                <div class="pro-header">
                    <h3>পণ্যের বিস্তারিত </h3>
                </div>
            </div>
        </div>
        <div class="row product-information">
            <div class="col-lg-5 col-md-6 products-name  wow fadeInLeft" data-wow-delay="0.3s">

                <div class="exzoom" id="exzoom">

                    <!-- Images -->
                    <div class="exzoom_img_box">

                        <ul class='exzoom_img_ul'>

                            <li><img style="top:0;" src="{{ asset($product->image_one) }}" /></li>

                            <li><img src="{{ asset($product->image_two) }}" /></li>

                            <li><img src="{{ asset($product->image_three) }}" /></li>

                            
                            ...

                        </ul>

                    </div>

                    <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->

                    <div class="exzoom_nav"></div>

                    <!-- Nav Buttons -->

                    <p class="exzoom_btn">

                        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
 
                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>

                    </p>
                </div>
            </div>


            <div class="col-lg-7 col-md-6 details-p-top wow fadeInRight" data-wow-delay="0.6s">

                <div class="p-detail-header">
                    <h3>{{ $product->product_name }}</h3>
                    <div class="p-icon">
                        <p> <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            ({{ count($comments) }} কাস্টমার মতামত )</p>
                    </div>
                    <div class="p-details-text">

                        <p>{!! $product->short_description !!}</p>
                    </div>
                    <div class="row details-top">
                        <div class="col-lg-3 col-sm-4 col-md-6 details-infos">
                            <div class="details-info">
                                @if ($product->company_id == NULL)
                                  @else                                
                                <p>কোম্পানি :</p>
                                @endif
                                <p>পণ্যের ক্যাটাগরি :</p>
                                <p>পণ্যের মজুদ :</p>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-6 details-info-top">
                            <div class="details-info1">
                                @if ($product->company_id == NULL)
                                @else
                                <p>{{ $product->company->company_name }} </p>
                                @endif
                                <p>{{ $product->category->category_name }} </p>
                                <p>রয়েছে </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-2 col-sm-3 col-md-4 icons-text">
                                    <div class="details-info1">
                                        <p>শেয়ার করুন </p>

                                    </div>
                                </div>
                                <div class="col-lg-10  col-sm-4 col-md-8 icons-icons">
                                    {{-- <div class="p-details-icon">
                                        <a href=""><i class="fa fa-facebook"></i></a>
                                        <a href=""><i class="fa fa-twitter"></i></a>
                                        <a href=""><i class="fa fa-linkedin"></i></a>
                                        <a href=""><i class="fa fa-pinterest-p"></i></a>
                                    </div> --}}
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row tabs-top">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link tab-link " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">পণ্যের বিবরণ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link active " id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">গ্রাহক পর্যালোচনা ({{ count($comments) }})</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs-discription">
                                    <div class="pro-header">
                                        <h3>পণ্যের বিবরণ </h3>
                                    </div>

                                    <p>{!! $product->long_description !!}</p>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade show active" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs-discription">
                                    <h3>গ্রাহক পর্যালোচনা</h3>
                                </div>
                                @foreach ($comments as $comment)                           
                                    <div class="row contact1-top wow fadeInDown" data-wow-delay="0.2s">
                                        <div class="comment-img col-lg-1 col-md-2 col-sm-3">
                                            <img src="{{ asset('fontend') }}/image/comment.png" alt="img" class="img-fluid">
                                        </div>
                                        <div class="col-lg-11 col-md-10 col-sm-9 ">
                                            <div class="rev-text">
                                                <h5>
                                                     {{ $comment->your_name }} ..... {{ $comment->created_at->diffForHumans() }}
                                                </h5>
                                                <div class="tabs-icon">
                                                    @if ($comment->star_rating == 1)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @elseif($comment->star_rating == 2)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @elseif($comment->star_rating == 3)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @elseif($comment->star_rating == 4)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else                                                   
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @endif
                                                </div>
                                                <p>{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs-form">
                                    <div class="col-lg-12 inner-form tab">
                                        <h3>আপনার মতামত জানান</h3>

                                        <form action="{{ route('store.comment') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <div class="row form-left">
                                                <div class="col-lg-12">
                                                    <div class="table">
                                                        <table>
                                                            <tr>
                                                                <td class="label1">review</td>
                                                                <td class="label1">1 star</td>
                                                                <td class="label1">2 star</td>
                                                                <td class="label1">3 star</td>
                                                                <td class="label1">4 star</td>
                                                                <td class="label1">5 star</td>
                                                            </tr>
                                                            <tr >
                                                                <td class="label1">Star Rating</td>
                                                                <td><input type="radio" name="star_rating" value="1"></td>
                                                                <td> <input type="radio" name="star_rating" value="2"></td>
                                                                <td><input type="radio" name="star_rating" value="3"></td>
                                                                <td> <input type="radio" name="star_rating" value="4"></td>
                                                                <td><input type="radio" name="star_rating" value="5"></td>
                                                            </tr>
                                                        
                                                        </table>
                                                        @error('star_rating')
                                                        <small class="text-danger"> {{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 ">
                                                    <div class="inner-field rate-field">
                                                        <input type="text" name="your_name" value="{{ old('your_name') }}" placeholder="আপনার নাম *" data-validation="required">
                                                    </div>
                                                    @error('your_name')
                                                      <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 ">
                                                    <div class="inner-field">
                                                        <input type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="ইমেইল *" data-validation="required">
                                                    </div>
                                                    @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                  @enderror
                                                </div>
                                             
                                                <div class="col-lg-12">
                                                    <div class="inner-field">
                                                        <textarea name="comment" value="{{ old('comment') }}" placeholder="এখানে আপনার মতামত লিখুন *" data-validation="required"></textarea>
                                                    </div>
                                                    @error('comment')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                    <div class="forms-btn">
                                                        <button type="submit" style="cursor: pointer;">সাবমিট করুন</button>
                                                    </div>

                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <h5 class="mt-3">Comments with Facebook</h5>
                                    <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5" data-width=""></div> --}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--  =====================product details page  part end===================================-->

    <!--  =====================product slider page  part start===================================-->
    <section id="rel-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pro-header">
                        <h3>সম্পর্কিত পন্য </h3>
                    </div>
                </div>
            </div>
            <div class="row related-pro  related-slider">
                @foreach ($related_p as $product)
                    <div class="col-lg-3 text-center wow fadeInUp" data-wow-delay="0.2s">
                        <a href="{{ url('products/details/'.$product->id.'/'.$product->product_slug) }}">
                            <div class="rel-item">
                                <div class="rel-img">
                                    <img src="{{ asset($product->image_one) }}" alt="img" class="img">
                                </div>
                                <div class="b-project-text">
                                    @if ($product->company_id == NULL)
                                    <small style="color: black;">Category: 
                                        {{ $product->category->category_name }}</small>
                                    @else
                                    <small style="color: black;">Brand: 
                                        {{ $product->company->company_name }}</small>
                                    @endif
                                    <p style="color: #e81a46;"><strong>{{ $product->product_name }}</strong></p>
                                 
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach        
            </div>
        </div>
    </section>
    <!--  =====================back-top  part start=========================================-->
    <a href="#" class="back-top">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <!--  =====================back-top  part end=========================================-->
    <!--  =====================comment plugin===================================-->
    {{-- <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=225614495464352&autoLogAppEvents=1"></script> --}}
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f127633b7ebe1001249b066&product=inline-share-buttons&cms=sop' async='async'></script>
@endsection