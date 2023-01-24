@extends('layouts.admin')

@section('content')

<div class="card">
   <div class="card-header">
      <h2>Edit Product</h2>
   </div>

   <div class="card-body">
      <form action="{{ route('products.update' , $product->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          @if(session('success') !== null)
              <div class="alert alert-success">{{session('success')}}</div>
          @endif

         <div class="row">
            <div class="col-md-12 mb-3">
               <select class="form-select p-2">
                  <option value="">{{ $product->category->name }}</option>
                  {{-- @foreach ($category as $cate)
                  <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                  @endforeach --}}
               </select>
            </div>
            <div class="col-md-6 mb-3">
               <label for="name">Name</label>
               <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control border p-2">
            </div>
            <div class="col-md-6 mb-3">
               <label for="slug">Slug</label>
               <input type="text" name="slug" id="slug" value="{{ $product->slug }}" class="form-control border p-2">
            </div>
            <div class="col-md-12 mb-3">
               <label for="desc">Small Description</label>
               <textarea name="small_description" rows="3" id='desc'  class="form-control border p-2">{{ $product->small_description }}</textarea>
            </div>
            <div class="col-md-12 mb-3">
               <label for="desc">Description</label>
               <textarea name="description" rows="3" id='desc' class="form-control border p-2">{{ $product->description }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
               <label for="original_price">Original Price</label>
               <input type="number" name="original_price" id="original_price" value="{{ $product->original_price }}" class="form-control border p-2">
            </div>
            <div class="col-md-6 mb-3">
               <label for="selling_price">Selling Price</label>
               <input type="number" name="selling_price" id="selling_price" value="{{ $product->selling_price }}" class="form-control border p-2">
            </div>
            <div class="col-md-6 mb-3">
               <label for="tax">Tax</label>
               <input type="number" name="tax" id="tax" value="{{ $product->tax }}" class="form-control border p-2">
            </div>
            <div class="col-md-6 mb-3">
               <label for="qty">Quantity</label>
               <input type="number" name="qty" id="qty" value="{{ $product->qty }}" class="form-control border p-2">
            </div>
            <div class="col-md-6 md-3">
               <label for="status">Status</label>
               <input type="checkbox" name="status" id="status" {{ $product->status ? 'checked' : '' }}class="border p-2">
            </div>
            <div class="col-md-6 md-3">
               <label for="trending">Trending</label>
               <input type="checkbox" name="trending" id="trending" {{ $product->trending ? 'checked' : '' }} class="border p-2">
            </div>
            <div class="col-md-12 mb-3">
               <label for="meta_title">Meta Title</label>
               <input type="text" name="meta_title" id="meta_title" value="{{ $product->meta_title }}" class="form-control border p-2">
            </div>
            <div class="col-md-12 mb-3">
               <label for="meta_description">Meta Description</label>
               <textarea name="meta_description" rows="3" id='meta_description' class="form-control border p-2">{{ $product->meta_description }}</textarea>
            </div>
            <div class="col-md-12 mb-3">
               <label for="meta_keywords">Meta Keywords</label>
               <textarea name="meta_keywords" rows="3" id='meta_keywords' class="form-control border p-2">{{ $product->meta_keywords }}</textarea>
            </div>
            <div class="col-md-12 mb-3">
               <input type="file" name="image" class="form-control border p-2">
            </div>
            @if($product->image)
               <img src="{{ asset('assets/uploads/products/' . $product->image) }}" class='edit-image mb-3' alt="product image"/>
            @endif
            <div class="col-md-12 mb-3">
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </div>
      </form>
   </div>
</div>

@endsection
