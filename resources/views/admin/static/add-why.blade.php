@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Add Static Content For About Us Page - Why Us Section</h2>
        </div>

        <div class="card-body">
            <form action="{{ url('insert-why') }}" method="POST" enctype="multipart/form-data">
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

                @if(session('success') !== null)
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="status">Status</label>
                        <select class="form-select p-2" name="status" id="status">
                            <option value="">Select Status</option>
                            <option value="0">Hidden</option>
                            <option value="1">Visible</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="heading_title">Why Us Title</label>
                        <input type="text" name="heading" id="heading_title" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="heading_desc">Why Us Description</label>
                        <textarea name="description" rows="3" id='heading_desc' class="form-control border p-2"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="heading_image">Why Us Image</label>
                        <input type="file" name="image" id="heading_image" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
