@extends('layouts.front')

@section('title', $product->name)


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
   <div class="container">
      <h6 class="mb-6">Collections / {{ $product->category->name }} / {{ $product->name }}</h6>
   </div>
</div>

<div class="container">
   <div class="card shadow">
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

               @if ($product->qty > 0)
                  <label class="badge bg-success">In Stock</label>
                  @else
                  <label class="badge bg-danger">Out Of Stock</label>
               @endif
               <div class="row mt-2">
                  <div class="col-md-2">
                     <label for="Quantity">Quantity</label>
                     <div class="input-group text-center mb-3">
                        <span class="input-group-text"> - </span>
                        <input type="text" name="quantity" value="1" class="form-control">
                        <span class="input-group-text">+</span>
                     </div>
                  </div>
                  <div class="col-md-10">
                     <br>
                     <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist</button>
                     <button type="button" class="btn btn-primary me-3 float-start">Add to Cart</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
