@extends('layouts.admin')

@section('content')

    <div class="card table-responsive table-body">
        <div class="card-header">
            <h3>About Us Page Static Content</h3>
            <hr>
        </div>

        <div class="card-body">
            <table class="table text-center table-bordered table-striped w-100">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>heading_title</th>
                    <th>heading_desc</th>
                    <th>heading_image</th>
                    <th>heading_btn_1</th>
                    <th>heading_btn_2</th>
                    <th>why_us_title</th>
                    <th>why_us_desc</th>
                    <th>why_us_image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($static as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->status === 0 ? 'Hidden' : 'Visible' }}</td>
                        <td>{{ $item->heading_title }}</td>
                        <td>{{ $item->heading_desc }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $item->image) }}" class="cate-image" alt="img not found">
                        </td>
                        <td>{{ $item->heading_btn_1 ?: '' }}</td>
                        <td>{{ $item->heading_btn_2 ?: '' }}</td>
                        <td>{{ $item->why_us_title }}</td>
                        <td>{{ $item->why_us_desc }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $item->image) }}" class="cate-image" alt="img not found">
                        </td>
                        <td>
                            <a href="{{ url('view-content/' . $item->id) }}" class="btn btn-warning">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <a href="{{ url('edit-content/' . $item->id) }}" class="btn btn-info">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <a href="{{ url('delete-content/' . $item->id) }}" class="btn btn-danger">
                                <span class="material-symbols-outlined">delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
{{--                {{ $products->links() }}--}}
            </div>
        </div>
    </div>

@endsection
