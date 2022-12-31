@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Add Team Member</h2>
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
                @foreach ($team as $member)
                    <tr>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->title }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($member->description, 50, $end='...') }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/team/' . $member->image) }}" class="cate-image" alt="img not found">
                        </td>
                        <td>
                            <a href="{{ url('view-member/' . $member->id) }}" class="btn btn-warning">
                                <span class="material-symbols-outlined">visibility</span>
                            </a>
                            <a href="{{ url('edit-member/' . $member->id) }}" class="btn btn-info">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <a href="{{ url('delete-member/' . $member->id) }}" class="btn btn-danger">
                                <span class="material-symbols-outlined">delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                {{ $team->links() }}
            </div>
        </div>
    </div>

@endsection
