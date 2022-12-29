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
                                <h4>Message Details</h4>
                                <hr/>
                                <label for="" class="mt-3 text-bold">First Name</label>
                                <div class="border px-2">{{ $message->fname }}</div>
                                <label for="" class="mt-3 text-bold">Last Name</label>
                                <div class="border px-2">{{ $message->lname }}</div>
                                <label for="" class="mt-3 text-bold">Email</label>
                                <div class="border px-2">{{ $message->email }}</div>
                                <label for="" class="mt-3 text-bold">Subject</label>
                                <div class="border px-2">{{ $message->subject }}</div>
                                <label for="" class="mt-3 text-bold">Message Content</label>
                                <div class="border px-2">{{ $message->content }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
