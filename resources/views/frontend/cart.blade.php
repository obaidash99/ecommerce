@extends('layouts.front')

@section('title')
My Cart
@endsection


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
   <div class="container">
      <h6 class="mb-6">
         <a href="{{ url('/') }}">Home</a> / 
         <a href="{{ url('cart') }}">Cart</a>
      </h6>
   </div>
</div>


<div class="container my-5">
   <div class="card shadow product-data">
      <div class="card-body">

         @foreach ($cart_items as $item )
            <div class="row my-2 d-flex align-items-center">
               <div class="col-md-2">
                  <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt="product image" class="cart-product-img">
               </div>
               <div class="col-md-5">
                  <h5>{{ $item->products->name }}</h5>
               </div>
               <div class="col-md-3 d-flex flex-column align-items-center">
                  <input type="hidden" class="prod_id">
                  <label for="Quantity">Quantity</label>
                  <div class="input-group text-center mb-3" style="width: 130px">
                     <button class="input-group-text decrement-btn">-</button>
                     <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->product_qty }}">
                     <button class="input-group-text increment-btn">+</button>
                  </div>
               </div>
               <div class="col-md-2">
                  <h5>Remove</h5>
               </div>
            </div>
         @endforeach

      </div>
   </div>
</div>

@endsection
