@extends('layouts.front')

@section('title')
   {{ $category->name }}
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
   <div class="container">
      <h6 class="mb-0">
         <a href="{{ url('category') }}">Collections</a> /
         <a href="{{ url('category/' . $category->slug ) }}">{{ $category->name }}</a>
      </h6>
   </div>
</div>

   <div class="py-5">
      <div class="container">
         <div class="row">
            <h2>{{ $category->name }}</h2>
            @foreach ($product as $product)
               <div class="col-md-3 mb-3">
                  <div class="card">
                     <a href="{{ url('category/' . $category->slug . '/' . $product->slug) }}">
                        <img src="{{ asset('assets/uploads/products/' . $product->image) }}" alt="Product Image" class="featured-img">
                        <div class="card-body">
                           <h5>{{ $product->name }}</h5>
                           <span class="float-start">$ {{ $product->selling_price }}</span>
                           <span class="float-end"><s>$ {{ $product->original_price }}</s></span>
                        </div>
                     </a>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </div>

@endsection
