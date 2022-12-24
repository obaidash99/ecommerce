@extends('layouts.front')

@section('title', 'Write A Review')


@section('content')

   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="card mt-3">
               <div class="card-body">
                  @if ($verfied_purchase->count() > 0)
                     <h5>You Writing A Review for {{ $product->name }}</h5>
                     <form action="{{ url('/add-review') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea class="form-control" name="user_review" rows="5" placeholder="Write A Review"></textarea>
                        <button type="submit" class="btn btn-primary my-3">Submit</button>
                     </form>
                  @else
                  <div class="alert alert-danger">
                     <h5>You Are not Eligible to Review this Product</h5>
                     <p>
                        For the Trustworthiness of the reviews, Only Customers who purchased this product can write reviews about it.
                     </p>
                     <a href="{{ url('/') }}" class="btn btn-primary my-3">Home Page</a>
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection