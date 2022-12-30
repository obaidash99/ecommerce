@extends('layouts.front')

@section('title', 'All Products')

@section('content')


    <div class="py-5">
        <div class="container">
            <div class="row">
{{--                <h2>{{ $category->name }}</h2>--}}
                @foreach ($products as $product )
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('view-product/' . $product->slug) }}">
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
            <div class="row">
            {{ $products->links() }}
            </div>
        </div>
    </div>

@endsection
