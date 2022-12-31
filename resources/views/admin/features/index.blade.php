@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>All Features</h3>
            <a href="{{url('add-feature')}}" class="btn btn-warning text-white float-end">Add Feature</a>

            <hr>
        </div>

        <div class="card-body">
            <table class="table text-center table-bordered table-striped custom-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($features as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->description, 50, $end='...') }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/features/' . $item->image) }}" class="cate-image" alt="img not found">
                        </td>
                        <td>
                            <a href="{{ url('edit-feature/' . $item->id) }}" class="btn btn-info">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <a href="{{ url('delete-feature/' . $item->id) }}" class="btn btn-danger">
                                <span class="material-symbols-outlined">delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
{{--            {{ $features->links() }}--}}
        </div>
    </div>

@endsection
