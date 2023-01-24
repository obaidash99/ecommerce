@extends('layouts.admin')

@section('content')

<div class="card">
   <div class="card-header">
      <h3>All Products</h3>
      <hr>
   </div>

   <div class="card-body">
      <table class="table text-center table-bordered table-striped w-100">
         <thead>
            <tr>
               <th>ID</th>
               <th>Category</th>
               <th>Name</th>
               <th>Description</th>
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
               <td>{{ \Illuminate\Support\Str::limit($item->description, 50, $end='...') }}</td>
               <td>{{ $item->selling_price }}</td>
               <td>
                  <img src="{{ asset('assets/uploads/products/' . $item->image) }}" class="cate-image" alt="img not found">
               </td>
               <td>
                  <a href="{{ route('products.edit' , $item) }}" class="btn btn-info">Edit</a>
                  <a href="{{ route('products.show' , $item) }}" class="btn btn-danger">Delete</a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
      <div class="row">
      {{ $products->links() }}
      </div>
   </div>
</div>

@endsection
