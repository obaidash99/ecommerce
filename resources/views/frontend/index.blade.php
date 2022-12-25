@extends('layouts.front')

@section('title')
Welcome to E-Shop
@endsection

@section('content')

   @include('layouts.inc.slider')

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
                  </a>
               </div>
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