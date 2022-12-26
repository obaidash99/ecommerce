@extends('layouts.front')

@section('title', $product->name)


@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <form action="{{ url('/add-rating') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value={{ $product->id }}>
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Rate {{ $product->name }}</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="rating-css">
                  <div class="star-icon">
                     @if ($user_rating)
                        @for ($i=1; $i <= $user_rating->stars_rated; $i++)
                           <input type="radio" value="{{ $i }}" name="product_rating" checked id="rating{{ $i }}">
                           <label for="rating{{ $i }}" class="fa fa-star"></label>
                        @endfor
                        @for ($j = $user_rating->stars_rated+1; $j<=5; $j++)
                           <input type="radio" value="{{ $i }}" name="product_rating" id="rating{{ $i }}">
                           <label for="rating{{ $i }}" class="fa fa-star"></label>
                        @endfor
                     @else
                        <input type="radio" value="1" name="product_rating" checked id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" name="product_rating" id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" name="product_rating" id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="4" name="product_rating" id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="product_rating" id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                     @endif
                  </div>
            </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>


<div class="py-3 mb-4 shadow-sm bg-warning border-top">
   <div class="container">
      <h6 class="mb-0">
         <a href="{{ url('category') }}">Collections</a> / 
         <a href="{{ url('category/' . $product->category->slug ) }}">{{ $product->category->name }}</a> /
         <a href="{{ url('category/' . $product->category->slug . '/' . $product->slug  ) }}">{{ $product->name }}</a> 
      </h6>
   </div>
</div>

<div class="container pb-5 pt-3">
   <div class="product-data">
      <div class="">
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
               <label class="me-3 text-bold">Selling Price: $ {{ $product->selling_price }}</label>
               @php
                  $rate_num = number_format($rating_value);
               @endphp
               <div class="rating">
                     <span>
                        @if ($rating->count() > 0)
                           {{ $rating->count()  }} Rating
                        @else
                           No Rating
                        @endif
                     </span>
                     @for ($i=1; $i <= $rate_num; $i++)
                        <i class="fa fa-star checked"></i>
                        @endfor
                        @for ($j = $rate_num+1; $j<=5; $j++)
                        <i class="fa fa-star"></i>
                     @endfor
               </div>
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
            <div class="col-md-12">
               <hr>
               <h3>Description</h3>
               <p class="mt-3">{{ $product->small_description }}</p>
            </div>
            <hr/>
         </div>

         <div class="row">
            <div class="col-md-4">
               <!-- Button trigger modal -->
               <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Rate this {{ $product->name }}
               </button>

               <a href="{{ url('add-review/' . $product->slug . '/' . 'userreview') }}" class="btn btn-link">
                  Write A Review
               </a>
            </div>
            <div class="col-md-8">
               @foreach ($reviews as $review)
                  <div class="user-review">
                     <label for="" >{{ $review->user->name }} {{ $review->user->lname }}</label>
                     @if ($review->user_id == Auth::id())
                        <a href="{{ url('edit-review/' . $product->slug . '/userreview') }}" class="float-end text-sm btn btn-primary">Edit</a>
                     @endif
                     <br/>

                     @php
                        $rating = APP\Models\Rating::where('prod_id', $product->id)->where('user_id', $review->user->id)->first();
                     @endphp

                     @if ($rating)
                        @php $user_rate = $rating->stars_rated @endphp
                        @for ($i=1; $i <= $user_rate; $i++)
                           <i class="fa fa-star checked"></i>
                           @endfor
                           @for ($j = $user_rate+1; $j<6; $j++)
                           <i class="fa fa-star"></i>
                        @endfor
                     @endif
                     <small>Reviewed at {{ $review->created_at->format('d M Y') }}</small>
                     <p>{{ $review->user_review }}</p>
                  </div>
               @endforeach
            </div>
         </div>


      </div>
   </div>
</div>

@endsection