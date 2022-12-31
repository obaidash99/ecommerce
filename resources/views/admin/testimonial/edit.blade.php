@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Edit Testimonial Details</h2>
        </div>

        <div class="card-body">
            <form action="{{ url('update-testimonial/' . $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $testimonial->name }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $testimonial->title }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="desc">Description</label>
                        <textarea name="description" rows="3" id='desc' class="form-control border p-2">{{ $testimonial->description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control border p-2">
                    </div>
                    @if($testimonial->image)
                        <img src="{{ asset('assets/uploads/testimonials/' . $testimonial->image) }}" class='edit-image mb-3' alt="member image"/>
                    @endif
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
