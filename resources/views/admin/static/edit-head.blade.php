@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Add Static Content For About Us Page - Why Us Section</h2>
        </div>

        <div class="card-body">
            <form action="{{ url('update-head/' . $static_head->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                        <label for="status">Status</label>
                        <select class="form-select p-2" name="status" id="status">
                            <option value="{{ $static_head->status }}">Select Status</option>
                            <option value="0">Hidden</option>
                            <option value="1">Visible</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="heading_title">Why Us Title</label>
                        <input type="text" name="heading" id="heading_title" value="{{ $static_head->heading }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="heading_desc">Why Us Description</label>
                        <textarea name="description" rows="3" id='heading_desc' class="form-control border p-2">{{ $static_head->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="heading_image">Why Us Image</label>
                        <input type="file" name="image" id="heading_image" class="form-control border p-2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="heading_btn_1">First Button Text</label>
                        <input type="text" name="heading_btn_1" id="heading_btn_1" value="{{ $static_head->heading_btn_1 }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="heading_btn_2">Second Button Text</label>
                        <input type="text" name="heading_btn_2" id="heading_btn_2" value="{{ $static_head->heading_btn_2 }}" class="form-control border p-2">
                    </div>
                    @if($static_head->image)
                        <div class="col-md-6 mb-3">
                        <img src="{{ asset('assets/uploads/static/' . $static_head->image) }}" class='edit-image mb-3' alt="product image"/>
                        </div>
                    @endif
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
