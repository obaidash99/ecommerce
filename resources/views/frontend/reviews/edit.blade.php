@extends('layouts.front')

@section('title', 'Edit Your Review')


@section('content')

   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="card mt-3">
               <div class="card-body">
                     <h5>You Writing A Review for {{ $review->product->name }}</h5>
                     <form action="{{ url('/update-review') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="review_id" value="{{ $review->product->id }}">
                        <textarea class="form-control" name="user_review" rows="5" placeholder="Write A Review">{{ $review->user_review }}</textarea>
                        <button type="submit" class="btn btn-primary my-3">Update Review</button>
                     </form>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection