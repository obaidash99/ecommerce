@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Testimonials</h2>
            <a href="{{url('add-testimonial')}}" class="btn btn-warning text-white float-end">Add Testimonial</a>
        </div>

        <div class="card-body">
            <table class="table text-center table-bordered table-striped w-100">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($testimonials as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->description, 50, $end='...') }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/testimonials/' . $item->image) }}" class="cate-image" alt="img not found">
                        </td>
                        <td>
                            <a href="{{ url('view-testimonial/' . $item->id) }}" class="btn btn-warning">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <a href="{{ url('edit-testimonial/' . $item->id) }}" class="btn btn-info">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <a href="{{ url('delete-testimonial/' . $item->id) }}" class="btn btn-danger">
                                <span class="material-symbols-outlined">delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
{{--                {{ $testimonials->links() }}--}}
            </div>
        </div>
    </div>

@endsection
