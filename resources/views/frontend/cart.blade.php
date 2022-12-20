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
         @php
            $total = 0;
         @endphp
         @foreach ($cart_items as $item )
            <div class="row my-2 d-flex align-items-center">
               <div class="col-md-2">
                  <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt="product image" class="cart-product-img">
               </div>
               <div class="col-md-3">
                  <h5>{{ $item->products->name }}</h5>
               </div>
               <div class="col-md-2">
                  <p>$ {{ $item->products->selling_price }}</p>
               </div>
               <div class="col-md-3 d-flex flex-column align-items-center">
                  <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                  @if ($item->products->qty >= $item->product_qty)
                     <label for="Quantity">Quantity</label>
                     <div class="input-group text-center mb-3" style="width: 130px">
                        {{-- <button class="input-group-text decrement-btn">-</button> --}}
                        <input type="number" min="1" max="10" name="quantity" class="form-control change-quantity qty-input text-center" id="qty-input" value="{{ $item->product_qty }}">
                        {{-- <button class="input-group-text increment-btn">+</button> --}}
                     </div>
                     @php
                        $total += $item->products->selling_price * $item->product_qty;
                     @endphp
                     @else
                     <label class="badge bg-danger">Out of Stock</label>
                  @endif
               </div>
               <div class="col-md-2">
                  <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
               </div>
            </div>
            
         @endforeach
      </div>
      <div class="card-footer">
         <h6 class="d-inline-block m-auto">Total Price: $ {{ $total }}</h6>
         <a href="{{ url("checkout") }}" class="btn btn-outline-success float-end">Proceed To Checkout</a>
      </div>
   </div>
</div>

@endsection
