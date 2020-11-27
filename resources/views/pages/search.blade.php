@extends('layouts.fontend-master')
@section('title') পণ্য অনুসন্ধান @endsection
@section('body')  
<body id="otherpage" class="about-page">
 @endsection
@section('content')  
    <!--  =====================banner  part start=================================-->
 <section id="breadcumbs">
    <div class="container"> 
           <div class="row">  
                <div class="col-lg-12 text-center"> 
                    <div class="bread-text wow fadeInUp">  
                          <h2>অনুসন্ধানী পণ্যসমূহ </h2>
                          <h4><a href="{{ url('/') }}">হোম</a><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>>অনুসন্ধানী পণ্যসমূহ </h4>
                    </div>
                </div>       
           </div>
    </div>
   </section> 
  <!--  =====================banner  part end===================================-->
  <!--  =====================dealer   page part start===================================-->
  <section id="dealer">
      <div class="container">
        <div class="row">
            <div class="col-lg-3">
               <div class="dealer-category wow fadeInDown mx-1">
                  <h3>ক্যাটাগরিসমূহ </h3>
                  @foreach ($categories as $category)
                  <p><a class="@yield($category->category_slug)" href="{{ url('category/products/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}</a></p>                    
                  @endforeach
               </div>
               <div class="dealer-category wow fadeInDown mx-1 " data-wow-delay="0.2s">
                <h3>সাব-ক্যাটাগরিসমূহ</h3>
                @foreach ($subcategories as $subcategory)
                <p><a class="@yield($subcategory->subcategory_slug)" href="{{ url('subcategory/products/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">{{ $subcategory->subcategory_name }}</a></p>                    
                @endforeach
             </div>
               <div class="dealer-brand wow fadeInDown mx-1" data-wow-delay="0.3s">
                  <h3>ডিলার</h3>
                  @foreach ($delars as $delar)              
                  <p><a href="{{ url('delar/products/'.$delar->id) }}" class="@yield($delar->company_slug)">{{ $delar->company_name }}</a></p>
                  @endforeach
               </div>
               <div class="dealer-brand wow fadeInDown mx-1" data-wow-delay="0.3s">
                <h3>ডিলার পণ্যসমূহ</h3>
                @foreach ($delar_services as $service)              
                <p><a href="{{ url('delar/company-products/'.$service->id.'/'.$service->delar_product_slug) }}" class="@yield($service->delar_product_slug.'/'.$service->id)">{{ $service->delar_product_name }}</a></p>
                @endforeach
             </div>
            </div>
            <div class="col-lg-9">
               <div class="row dealer-top">
                  <div class="col-lg-6 col-sm-4 dealers-header">
                     <div class="dealer-header">
                        <h3><span>{{ count($products) }}</span> টি পণ্য পাওয়া গেছে</h3>
                     </div>
                  </div>
                  <div class="col-lg-6 col-sm-8 text-left dealer-forms">
                    <form action="{{ route('search.products') }}" method="post" >
                        @csrf
                          <div class="dealer-form">
                            <input type="text" name="search" placeholder="পণ্য খুজুন" required>
                            <button type="submit" style="cursor: pointer;"><i class="fa fa-search"></i></button>
                         </div>                        
                       </form>
                  </div>
               </div>
               <div class="row  dealer-product-top">
                   @forelse ($products as $product)         
                    <div class="col-lg-3 dealer-effect text-center wow fadeInDown">
                        <a href="{{ url('products/details/'.$product->id.'/'.$product->product_slug) }}">
                        <div class="dealer-product">
                            <div class="dealer-item">
                                <img src="{{ asset($product->image_one) }}" alt="" class="img-fluid">
    
                            </div>
                            <div class="dealer-text">
                                @if ($product->company_id == NULL)
                                <small style="color: black;">Category: 
                                    {{ $product->category_name }}</small>
                                @else
                                <small style="color: black;">Brand: 
                                    {{ $product->company_name }}</small>
                                @endif
                                <h4 class="mt-1"><strong>{{ $product->product_name }}</strong></h4>
                            </div>
                            
                        </div>
                        </a>
                    </div>
                    @empty 
                    <strong class="text-danger text-center">দুঃখিত !! আপনার অনুসন্ধানে কোনো পণ্য পাওয়া যায়নি</strong>
                  @endforelse
                    
               </div>
               <div class="row pagination-top " style="float:right;">        
                <div class="col-lg-12">
                  {{ $products->links() }}
                </div>
              </div>
            </div>
            
        </div>
        
  
      </div>
  </section>
  <!--  =====================back-top  part start=========================================-->
  <a href="#" class="back-top">
    <i class="fa fa-angle-double-up"></i>
</a>
<!--  =====================back-top  part end=========================================-->
<script>
  function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
  }
  </script>
@endsection