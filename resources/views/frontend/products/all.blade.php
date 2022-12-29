@extends('layouts.front')

@section('title', 'All Products')

@section('content')

{{--    <div class="py-3 mb-4 shadow-sm bg-warning border-top">--}}
{{--        <div class="container">--}}
{{--            <h6 class="mb-0">--}}
{{--                <a href="{{ url('category') }}">Collections</a> /--}}
{{--                <a href="{{ url('category/' . $category->slug ) }}">{{ $category->name }}</a>--}}
{{--            </h6>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="py-5">
        <div class="container">
            <div class="row">
{{--                <h2>{{ $category->name }}</h2>--}}
                @foreach ($products as $product )
                    <div class="col-md-3 mb-3">
                        <div class="card">
{{--                            <a href="{{ url('category/' . $category->slug . '/' . $product->slug) }}">--}}
                            <a href="#">
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
