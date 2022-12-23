@extends('layouts.front')

@section('title', $product->name)


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
   <div class="container">
      <h6 class="mb-6">
         <a href="{{ url('category') }}">Collections</a> / 
         <a href="{{ url('category/' . $product->category->slug ) }}">{{ $product->category->name }}</a> /
         <a href="{{ url('category/' . $product->category->slug . '/' . $product->slug  ) }}">{{ $product->name }}</a> 
      </h6>
   </div>
</div>

<div class="container">
   <div class="card shadow product-data">
      <div class="card-body">
         <div class="row">
            <div class="col-md-4 border-right">
               <img src="{{ asset('assets/uploads/products/' . $product->image) }}" class="view-product-img" alt="img not found">
            </div>
            <div class="col-md-8">
               <h2 class="mb-0">
                  {{ $product->name }}
                  @if ($product->trending == '1')
                     <label class="float-end badge bg-danger trending_tag" style="font-size: 16px;">Trending</label>
                  @endif
               </h2>
               <hr>
               <label class="me-3 text-bold">Original Price: <s>$ {{ $product->original_price }}</s></label>
               <label class="me-3 text-bold">Original Price: $ {{ $product->selling_price }}</label>
               <p class="mt-3">{{ $product->small_description }}</p>
               <hr>

               {{-- @if ($product->qty < 4)
               <label class="badge bg-danger">{{ $product->qty }} Left in Stock</label> --}}
               @if ($product->qty > 0)
               <label class="badge bg-success">in Stock</label>
                  @else
                  <label class="badge bg-danger">Out of Stock</label>
               @endif
               <div class="row mt-2">
                  <div class="col-md-2">
                     <input type="hidden" value="{{ $product->id }}" class="prod-id">
                     <label for="Quantity">Quantity</label>
                     <div class="input-group text-center mb-3">
                        {{-- <button class="input-group-text decrement-btn"> - </button> --}}
                        <input type="number" min="0" max="10" name="quantity" value="1" class="form-control qty-input text-center">
                        {{-- <button class="input-group-text increment-btn">+</button> --}}
                     </div>
                  </div>
                  <div class="col-md-10">
                     <br>
                     <button type="button" class="btn btn-success me-3 float-start add-to-wishlist">
                        Add to Wishlist <i class="fa fa-heart"></i>
                     </button>
                     @if ($product->qty > 0)
                     <button type="button" class="btn btn-primary me-3 float-start add-to-cart">
                        Add to Cart <i class="fa fa-cart-shopping"></i>
                     </button>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <hr>
            <h3>Description</h3>
            <p class="mt-3">{{ $product->description }}</p>
         </div>
      </div>
   </div>
</div>

@endsection