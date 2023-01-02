@extends('layouts.admin')

@section('content')

    {{--    Heading Part--}}
    <div class="card table-responsive table-body vh-100">
        <div class="card-header">
            <h3>Home Page - Head Static Content</h3>
{{--            <a href="{{url('add-home-head')}}" class="btn btn-warning text-white float-end">Add Content</a>--}}
        </div>

        <div class="card-body">
            <table class="table text-center table-bordered table-striped w-100">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>title</th>
                    <th>description</th>
                    <th>image</th>
                    <th>button 1</th>
                    <th>button 2</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach ($static_head as $item)--}}
                    <tr>
                        <td>{{ $static_head->id }}</td>
                        <td>{{ $static_head->title}}</td>
                        <td>{{ \Illuminate\Support\Str::limit($static_head->description, 50, $end='...') }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/static/' . $static_head->image) }}" class="cate-image" alt="img not found">
                        </td>
                        <td>{{ $static_head->btn_1_content ?: '' }}</td>
                        <td>{{ $static_head->btn_2_content ?: '' }}</td>
                        <td>
                            <a href="{{ url('/') }}" class="btn btn-warning" target="_blank">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <a href="{{ url('edit-home-head/' . $static_head->id) }}" class="btn btn-info">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                        </td>
                    </tr>
{{--                @endforeach--}}
                </tbody>
            </table>
        </div>
    </div>

@endsection
