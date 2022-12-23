@extends('layouts.admin')

@section('content')

<div class="card">
   <div class="card-header">
      <h3>Registered Users</h3>
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
               <td>
                  <a href="{{ url('view-user/' . $user->id) }}" class="btn btn-info">View</a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>

@endsection