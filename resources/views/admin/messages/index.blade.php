@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>All Products</h3>
            <hr>
        </div>

        <div class="card-body">
            <table class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->id }}</td>
                        <td>{{ $message->fname . ' ' . $message->lname }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>
                            <a href="{{ url('view-message/' . $message->id) }}" class="btn btn-info">View</a>
                            <a href="{{ url('delete-message/' . $message->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
