@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3>All Newsletter</h3>
            <hr>
        </div>

        <div class="card-body">
            <table class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($newsletters as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
