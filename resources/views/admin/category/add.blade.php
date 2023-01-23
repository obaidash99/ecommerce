@extends('layouts.admin')

@section('content')

<div class="card">
   <div class="card-header">
      <h2>Add Category</h2>
   </div>

   <div class="card-body">
      <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-md-6 md-3">
               <label for="name">Name</label>
               <input type="text" name="name" id="name" class="form-control border p-2">
            </div>
            <div class="col-md-6 md-3">
               <label for="slug">Slug</label>
               <input type="text" name="slug" id="slug" class="form-control border p-2">
            </div>
            <div class="col-md-12 md-3">
               <label for="desc">Description</label>
               <textarea name="description" rows="3" id='desc' class="form-control border p-2"></textarea>
            </div>
            <div class="col-md-6 md-3">
               <label for="status">Status</label>
               <input type="checkbox" name="status" id="status" class="border p-2">
            </div>
            <div class="col-md-6 md-3">
               <label for="popular">Popular</label>
               <input type="checkbox" name="popular" id="popular" class="border p-2">
            </div>
            <div class="col-md-12 md-3">
               <label for="meta_title">Meta Title</label>
               <input type="text" name="meta_title" id="meta_title" class="form-control border p-2">
            </div>
            <div class="col-md-12 md-3">
               <label for="meta_desc">Meta Description</label>
               <textarea name="meta_desc" rows="3" id='meta_desc' class="form-control border p-2"></textarea>
            </div>
            <div class="col-md-12 mb-3">
               <label for="meta_keywords">Meta Keywords</label>
               <textarea name="meta_keywords" rows="3" id='meta_keywords' class="form-control border p-2"></textarea>
            </div>
            <div class="col-md-12 mb-3">
               <input type="file" name="image" class="form-control border p-2">
            </div>
            <div class="col-md-12 mb-3">
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </div>
      </form>
   </div>
</div>

@endsection
