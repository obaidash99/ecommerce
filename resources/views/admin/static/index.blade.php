@extends('layouts.admin')

@section('content')

    {{--    Heading Part--}}
    <div class="card table-responsive table-body">
        <div class="card-header">
            <h3>About Us - Head Static Content</h3>
{{--            <a href="{{url('add-head')}}" class="btn btn-warning text-white float-end">Add Content</a>--}}
{{--            <hr>--}}
        </div>

        <div class="card-body">
            <table class="table text-center table-bordered table-striped w-100">
                <thead>
                <tr>
                    <th>ID</th>
{{--                    <th>Status</th>--}}
                    <th>heading</th>
                    <th>description</th>
                    <th>image</th>
                    <th>button 1</th>
                    <th>button 2</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($static_head as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
{{--                        <td>{{ $item->status === 0 ? 'Hidden' : 'Visible' }}</td>--}}
                        <td>{{ $item->heading}}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->description, 50, $end='...') }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $item->image) }}" class="cate-image" alt="img not found">
                        </td>
                        <td>{{ $item->heading_btn_1 ?: '' }}</td>
                        <td>{{ $item->heading_btn_2 ?: '' }}</td>
                        <td>
                            <a href="{{ url('about-us') }}" class="btn btn-warning" target="_blank">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <a href="{{ url('edit-head/' . $item->id) }}" class="btn btn-info">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <a href="{{ url('delete-head/' . $item->id) }}" class="btn btn-danger">
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

    {{--    Why Us Part--}}
    <div class="card table-responsive table-body mt-5">
        <div class="card-header">
            <h3>About Us - Why Us Static Content</h3>
{{--            <a href="{{url('add-why')}}" class="btn btn-warning text-white float-end">Add Content</a>--}}
{{--            <hr>--}}
        </div>

        <div class="card-body">
            <table class="table text-center table-bordered table-striped w-100">
                <thead>
                    <tr>
                        <th>ID</th>
{{--                        <th>Status</th>--}}
                        <th>heading</th>
                        <th>description</th>
                        <th>image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($static_why as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
{{--                        <td>{{ $item->status === 0 ? 'Hidden' : 'Visible' }}</td>--}}
                        <td>{{ $item->heading}}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->description, 50, $end='...') }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $item->image) }}" class="cate-image" alt="img not found">
                        </td>
                        <td>
                            <a href="{{ url('about-us') }}" class="btn btn-warning" target="_blank">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <a href="{{ url('edit-why/' . $item->id) }}" class="btn btn-info">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <a href="{{ url('delete-why/' . $item->id) }}" class="btn btn-danger">
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
