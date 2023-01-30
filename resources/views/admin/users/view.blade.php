@extends('layouts.admin')

@section('content')

<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">
               <h3>
                  User Details
                  <a href="{{ route('users.index') }}" class="btn btn-warning float-end">Back</a>
               </h3>
               <hr>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-4 mt-3">
                     <label for="role">Role</label>
                     <div class="p-2 border" id="role">{{ $user->role_as == '0' ? 'Client' : 'Admin' }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="fname">First Name</label>
                     <div class="p-2 border" id="fname">{{ $user->name }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="lname">Last Name</label>
                     <div class="p-2 border" id="lname">{{ $user->lname }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="email">Email</label>
                     <div class="p-2 border" id="email">{{ $user->email }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="phone">Phone Number</label>
                     <div class="p-2 border" id="phone">{{ $user->phone }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="address1">Address 1</label>
                     <div class="p-2 border" id="address1">{{ $user->address1 }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="address2">Address 2</label>
                     <div class="p-2 border" id="address2">{{ $user->address2 }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="city">City</label>
                     <div class="p-2 border" id="city">{{ $user->city }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="state">State</label>
                     <div class="p-2 border" id="state">{{ $user->state }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="country">Country</label>
                     <div class="p-2 border" id="country">{{ $user->country }}</div>
                  </div>
                  <div class="col-md-4 mt-3">
                     <label for="zipcode">Zip Code</label>
                     <div class="p-2 border" id="zipcode">{{ $user->zipcode }}</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
