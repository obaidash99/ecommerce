@extends('layouts.front')

@section('title', Auth::user()->name . " - Profile"  )


@section('content')

<div class="container my-5">
   <div class="row">
      <div class="col-md-12">
         <h1 class="text-center">My Profile</h1>
         <hr>
      </div>
   </div>
   <div class="row">
      <div class="col-md-3">
         <img src="" alt="User Image" class="img-thumbnail">
      </div>
      <div class="col-md-9">
         <h3>{{ Auth::user()->name . ' ' . Auth::user()->lname }}</h3>
         <p>{{ Auth::user()->email }}</p>
         <p>{{ Auth::user()->phone }}</p>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <a href="" class="btn btn-primary float-right">Edit Profile</a>
      </div>
   </div>
</div>

@endsection
