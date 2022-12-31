@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Add Testimonal</h2>
        </div>

        <div class="card-body">
            <form action="{{ url('insert-testimonial') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success') != null)
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control border p-2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="desc">Description</label>
                        <textarea name="description" rows="3" id='desc' class="form-control border p-2"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
