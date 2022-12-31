@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Edit Feature Details</h2>
        </div>

        <div class="card-body">
            <form action="{{ url('update-feature/' . $feature->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $feature->title }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="desc">Description</label>
                        <textarea name="description" rows="3" id='desc' class="form-control border p-2">{{ $feature->description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control border p-2">
                    </div>
                    @if($feature->image)
                        <img src="{{ asset('assets/uploads/features/' . $feature->image) }}" class='edit-image mb-3' alt="member image"/>
                    @endif
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
