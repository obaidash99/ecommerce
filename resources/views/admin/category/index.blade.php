@extends('layouts.admin')

@section('content')

<div class="card">
   <div class="card-header">
      <h3>All Categoies</h3>
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
            @foreach ($category as $item)
            <tr>
               <td>{{ $item->id }}</td>
               <td>{{ $item->name }}</td>
                <td>{{ \Illuminate\Support\Str::limit($item->description, 50, $end='...') }}</td>
               <td>
                  <img src="{{ asset('assets/uploads/category/' . $item->image) }}" class="cate-image" alt="img not found">
               </td>
               <td>
                  <a href="{{ url('edit-category/' . $item->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{ url('delete-category/' . $item->id) }}" class="btn btn-danger">Delete</a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
       {{ $category->links() }}
   </div>
</div>

@endsection
