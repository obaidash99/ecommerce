@extends('layouts.front')

@section('title')
CheckOut
@endsection

@section('content')
   <div class="container mt-5">
      <form action="{{ url('place-order') }}" method="POST">
         @csrf
         <div class="row">
            <div class="col-md-7">
               <div class="card">
                  <div class="card-body">
                     <h5>Personal Details</h5>
                     <hr>
                     <div class="row checkout-form">
                        <div class="col-md-6 mb-3">
                           <label for="firstName">First Name</label>
                           <input type="text" class="form-control mt-1" value="{{ Auth::user()->name }}" name="fname" id="firstName" placeholder="First Name">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="lastName">Last Name</label>
                           <input type="text" class="form-control mt-1" value="{{ Auth::user()->lname }}" name="lname" id="lastName" placeholder="Last Name">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="email">Email</label>
                           <input type="email" class="form-control mt-1" value="{{ Auth::user()->email }}" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="phone">Phone Number</label>
                           <input type="number" class="form-control mt-1" value="{{ Auth::user()->phone }}" name="phone" id="phone" placeholder="Phone Number">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="adress1">Adress 1</label>
                           <input type="text" class="form-control mt-1" value="{{ Auth::user()->address1 }}" name="address1" id="adress1" placeholder="Adress 1">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="adress2">Adress 2</label>
                           <input type="text" class="form-control mt-1" value="{{ Auth::user()->address2 }}" name="address2" id="adress2" placeholder="Adress 2">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="country">Country</label>
                           <input type="text" class="form-control mt-1" value="{{ Auth::user()->country }}" name="country" id="country" placeholder="Country">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="city">City</label>
                           <input type="text" class="form-control mt-1" value="{{ Auth::user()->city }}" name="city" id="city" placeholder="City">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="state">State</label>
                           <input type="text" class="form-control mt-1" value="{{ Auth::user()->state }}" name="state" id="state" placeholder="State">
                        </div>
                        <div class="col-md-6 mb-3">
                           <label for="zipcode">Zip Code</label>
                           <input type="number" class="form-control mt-1" value="{{ Auth::user()->zipcode }}" name="zipcode" id="zipcode" placeholder="Zip Code">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="card">
                  <div class="card-body">
                     <h5>Order Details</h5>
                     <hr>
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th>Price</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($cart_items as $item )
                              <tr>
                                 <td>{{ $item->products->name }}</td>
                                 <td>{{ $item->product_qty }}</td>
                                 <td>{{ $item->products->selling_price }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                     <hr>
                     <button type="submit" class="btn btn-primary float-end">Place Order</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
@endsection