@extends('layouts.admin')

@section('content')

    <div class="card table-responsive">
        <div class="card-header">
            <h3>Footer Content</h3>
            <hr>
        </div>

        <div class="card-body">
            <table class="table text-center table-bordered table-striped w-100">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Main Image</th>
                    <th>Image: Social Media 1</th>
                    <th>Image: Social Media 2</th>
                    <th>Image: Social Media 3</th>
                    <th>Image: Social Media 4</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($footer as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->description, 50, $end='...') }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $item->main_image) }}" class="footer-icon" alt="img not found">
                        </td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $item->social_1_img) }}" class="footer-icon" alt="img not found">
                        </td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $item->social_2_img) }}" class="footer-icon" alt="img not found">
                        </td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $item->social_3_img) }}" class="footer-icon" alt="img not found">
                        </td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $item->social_4_img) }}" class="footer-icon" alt="img not found">
                        </td>
                        <td>
                            <a href="{{ route('footer.edit' , $item) }}" class="btn btn-info">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
            </div>
        </div>
    </div>

@endsection
