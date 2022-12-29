@extends('layouts.admin')

@section('title')
    My Orders
@endsection

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">
                            View Order
                            <a href="{{url('messages')}}" class="btn btn-warning text-white float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Newsletter to Subscribe</h4>
                                <label for="" class="text-bold">Name</label>
                                <div class="border px-2">{{ $newsletters->name }}</div>
                                <label for="" class="mt-3 text-bold">Email</label>
                                <div class="border px-2">{{ $newsletters->email }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
