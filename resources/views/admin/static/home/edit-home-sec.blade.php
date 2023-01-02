@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Edit Second Section Content For Home Page</h2>
        </div>

        <div class="card-body">
            <form action="{{ url('update-home-sec/' . $static_sec->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('success') !== null)
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="heading_title">Heading Title</label>
                        <input type="text" name="title" id="heading_title" value="{{ $static_sec->title }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="heading_desc">Heading Description</label>
                        <textarea name="description" rows="3" id='heading_desc' class="form-control border p-2">{{ $static_sec->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="heading_btn_1">First Button Text</label>
                        <input type="text" name="btn_content" id="heading_btn_1" value="{{ $static_sec->btn_content }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
