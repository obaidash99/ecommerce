@extends('layouts.admin')

@section('content')

<div class="card">
   <div class="card-header">
      <h3>Admin: {{Auth::user()->name}}</h3>
      <hr>
   </div>

   <div class="card-body">
      <table class="table text-center table-bordered table-striped">
         <thead>
            <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone Number</th>
{{--               <th>Image</th>--}}
               <th>Role</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($users as $user)
            <tr>
               <td>{{ $user->id }}</td>
               <td>{{ $user->name . " " . $user->lname}}</td>
               <td>{{ $user->email }}</td>
               <td>{{ $user->phone }}</td>
{{--                <td>--}}
{{--                    <img src="{{ asset('assets/uploads/users/' . $user->image) }}" class="cate-image" alt="img not found">--}}
{{--                </td>--}}
               <td>{{ $user->role_as == '0' ? 'Client' : 'Admin' }}</td>
               <td>
                  <a href="{{ route('users.show' , $user->id) }}" class="btn btn-info">View</a>
{{--                  <a href="{{ route('users.edit' , $user->id) }}" class="btn btn-success">Edit</a>--}}
{{--                  <a href="{{ route('users.destroy' , $user->id) }}" class="btn btn-danger">Delete</a>--}}
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>

@endsection
