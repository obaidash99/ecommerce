@extends('layouts.admin')

@section('title')
    {{ $testimonial->name . 'Testimonial' }}
@endsection

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">
                            Testimonial Details
                            <a href="{{url('testimonials')}}" class="btn btn-warning text-white float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 order-details">
                                <label for="image">Image</label>
                                <div class="border">
                                    <img src="{{ asset('assets/uploads/testimonials/' . $testimonial->image) }}" alt="member image" class="w-100 h-100" />
                                </div>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->title }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($testimonial->description, 50, $end='...') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
