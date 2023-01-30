@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Footer Content</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('footer.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ $footer->title }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="desc">Description</label>
                        <textarea name="description" rows="3" id='desc' class="form-control border p-2">{{ $footer->description }}</textarea>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="main_image">Main Image</label>
                        <input type="file" name="main_image" id="main_image" value="{{ $footer->main_image }}" class="form-control border p-2">
                    </div>
                    @if($footer->main_image)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('assets/uploads/static/' . $footer->main_image) }}" class='edit-image mb-3' alt="product image"/>
                        </div>
                    @endif
                    <div class="col-md-4 mb-3">
                        <label for="social_1_link">Social 1 Link</label>
                        <input type="text" name="social_1_link" id="social_1_link" value="{{ $footer->social_1_link }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="social_1_img">Social 1 Icon</label>
                        <input type="file" name="social_1_img" id="social_1_img" class="form-control border p-2">
                    </div>
                    @if($footer->social_1_img)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('assets/uploads/static/' . $footer->social_1_img) }}" class='edit-image mb-3' alt="product image"/>
                        </div>
                    @endif
                    <div class="col-md-4 mb-3">
                        <label for="social_2_link">Social 2 Link</label>
                        <input type="text" name="social_2_link" id="social_2_link" value="{{ $footer->social_2_link }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="social_2_img">Social 2 Icon</label>
                        <input type="file" name="social_2_img" id="social_2_img" class="form-control border p-2">
                    </div>
                    @if($footer->social_2_img)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('assets/uploads/static/' . $footer->social_2_img) }}" class='edit-image mb-3' alt="product image"/>
                        </div>
                    @endif
                    <div class="col-md-4 mb-3">
                        <label for="social_3_link">Social 3 Link</label>
                        <input type="text" name="social_3_link" id="social_3_link" value="{{ $footer->social_3_link }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="social_3_img">Social 3 Icon</label>
                        <input type="file" name="social_3_img" id="social_3_img" class="form-control border p-2">
                    </div>
                    @if($footer->social_3_img)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('assets/uploads/static/' . $footer->social_3_img) }}" class='edit-image mb-3' alt="product image"/>
                        </div>
                    @endif
                    <div class="col-md-4 mb-3">
                        <label for="social_4_link">Social 4 Link</label>
                        <input type="text" name="social_4_link" id="social_4_link" value="{{ $footer->social_4_link }}" class="form-control border p-2">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="social_4_img">Social 4 Icon</label>
                        <input type="file" name="social_4_img" id="social_4_img" class="form-control border p-2">
                    </div>
                    @if($footer->social_4_img)
                        <div class="col-md-4 mb-3">
                            <img src="{{ asset('assets/uploads/static/' . $footer->social_4_img) }}" class='edit-image mb-3' alt="product image"/>
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
