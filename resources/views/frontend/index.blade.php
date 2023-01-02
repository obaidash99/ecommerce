@extends('layouts.front')

@section('title')
Welcome to E-Shop
@endsection

@section('content')

{{--   @include('layouts.inc.slider')--}}

    {{--Hero Section--}}
   <div class="hero">
       <div class="container">
           <div class="row justify-content-between">
               <div class="col-lg-5">
                   <div class="intro-excerpt">
                       <h1>{{ $static_head->title }}</h1>
                       <p class="mb-4">{{ $static_head->description }}</p>
                       <p>
                           <a href="" class="btn btn-secondary me-2">{{ $static_head->btn_1_content }}</a>
                           <a href="#" class="btn btn-white-outline">{{ $static_head->btn_2_content }}</a>
                       </p>
                   </div>
               </div>
               <div class="col-lg-7">
                   <div class="hero-img-wrap">
                       <img src="{{ asset("assets/uploads/static/" . $static_head->image) }}" class="img-fluid">
                   </div>
               </div>
           </div>
       </div>
   </div>
    {{-- End Hero Section--}}

    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">{{ $static_sec->title }}</h2>
                    <p class="mb-4">{{ $static_sec->description }}</p>
                    <p><a href="shop.html" class="btn">{{ $static_sec->btn_content }}</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                @foreach($some_products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item add-to-wishlist" href="{{ url('category/' . $product->category->slug . '/' . $product->slug) }}">
                            <img src="{{ asset('assets/uploads/products/' . $product->image) }}" class="img-fluid product-thumbnail" alt="Product Image" width="216px" height="216px">
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <strong class="product-price">$ {{ $product->selling_price }}</strong>
                            <span class="icon-cross add-to-cart">
                                    <img src="{{ asset("frontend/images/cross.svg") }}" class="img-fluid" alt="icon">
                                </span>
                        </a>
                    </div>
                @endforeach
                <!-- End Column 2 -->
            </div>
        </div>
    </div>
    <!-- End Product Section -->

   <div class="py-5">
      <div class="container">
         <div class="row">
            <h2>Trending Products</h2>
            <div class="owl-carousel featured-carousel owl-theme">
               @foreach ($featured_products as $product )
                  <div class="item">
                     <a href="{{ url('category/' . $product->category->slug . '/' . $product->slug) }}">
                        <div class="card">
                           <img src="{{ asset('assets/uploads/products/' . $product->image) }}" alt="Product Image" class="featured-img">
                           <div class="card-body">
                              <h5>{{ $product->name }}</h5>
                              <span class="float-start">{{ $product->selling_price }}</span>
                              <span class="float-end"><s>{{ $product->original_price }}</s></span>
                           </div>
                        </div>
                     </a>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>

   <div class="py-5">
      <div class="container">
         <div class="row">
            <h2>Trending Categories</h2>
            <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($trending_category as $category )
               <div class="item">
                  <a href="{{ url('category/' . $category->slug) }}">
                     <div class="card">
                        <img src="{{ asset('assets/uploads/category/' . $category->image) }}" alt="Category Image" class="featured-img">
                        <div class="card-body">
                           <h5>{{ $category->name }}</h5>
                           <p class="float-start">{{ $category->description }}</p>
                        </div>
                    </div>
                  </a>
               </div>
            @endforeach
            </div>
         </div>
      </div>
   </div>

@endsection

@section("scripts")
   <script>
      $('.featured-carousel').owlCarousel({
         loop:true,
         margin:10,
         nav:true,
         responsive:{
            0:{
                  items:1
            },
            600:{
                  items:3
            },
            1000:{
                  items:4
            }
         }
      })
   </script>
@endsection
