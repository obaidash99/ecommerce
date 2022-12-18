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
               <th>Category</th>
               <th>Name</th>
               <th>Description</th>
               <th>Original Price</th>
               <th>Selling Price</th>
               <th>Image</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($products as $item)
            <tr>
               <td>{{ $item->id }}</td>
               <td>{{ $item->category->name}}</td>
               <td>{{ $item->name }}</td>
               <td>{{ $item->description }}</td>
               <td>{{ $item->original_price }}</td>
               <td>{{ $item->selling_price }}</td>
               <td>
                  <img src="{{ asset('assets/uploads/products/' . $item->image) }}" class="cate-image" alt="img not found">
               </td>
               <td>
                  <a href="{{ url('edit-product/' . $item->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{ url('delete-product/' . $item->id) }}" class="btn btn-danger">Delete</a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>

@endsection