@extends('layouts.front')

@section('title')
My Wishlist
@endsection


@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
   <div class="container">
      <h6 class="mb-6">
         <a href="{{ url('/') }}">Home</a> / 
         <a href="{{ url('wishlist') }}">Wishlist</a>
      </h6>
   </div>
</div>


<div class="container my-5">
   <div class="card shadow">
      <div class="card-body">
         @if($wishlist ->count() > 0)
            @foreach ($wishlist as $item )
               <div class="row my-2 d-flex align-items-center product-data">
                  <div class="col-md-2">
                     <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt="product image" class="cart-product-img">
                  </div>
                  <div class="col-md-2">
                     <h5>{{ $item->products->name }}</h5>
                  </div>
                  <div class="col-md-2">
                     <p>$ {{ $item->products->selling_price }}</p>
                  </div>
                  <div class="col-md-2">
                     <input type="hidden" class="prod-id" value="{{ $item->prod_id }}">
                     @if ($item->products->qty >= $item->product_qty)
                        <label class="badge bg-success">In Stock</label>  
                        @else
                        <label class="badge bg-danger">Out of Stock</label>
                     @endif
                  </div>
                  <div class="col-md-2">
                     <button class="btn btn-primary add-to-cart"><i class="fa fa-plus"></i> Add To Cart</button>
                  </div>
                  <div class="col-md-2">
                     <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i> Remove</button>
                  </div>
               </div>
            @endforeach
         @else
            <h4 class="text-center my-3">There is no Products in your Wishlist</h4>
         @endif
      </div>
   </div>
</div>

@endsection
