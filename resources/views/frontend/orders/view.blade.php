@extends('layouts.front')

@section('title')
   My Orders
@endsection

@section('content')

   <div class="container my-5">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                  <h4 class="text-center">View Order</h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="md-col-6">
                        <label for="">First Name</label>
                        <div class="border p-2">{{ $orders->fname }}</div>
                        <label for="">Last Name</label>
                        <div class="border p-2">{{ $orders->lname }}</div>
                        <label for="">Email</label>
                        <div class="border p-2">{{ $orders->email }}</div>
                        <label for="">Phone Number</label>
                        <div class="border p-2">{{ $orders->phone }}</div>
                        <label for="">Shipping Address</label>
                        <div class="border p-2">{{ $orders->adress1 }}, {{ $orders->adress2 }}, {{ $orders->city }}, {{ $orders->state }}, {{ $orders->country }}</div>
                        <label for="">Zip Code</label>
                        <div class="border p-2">{{ $orders->zipcode }}</div>
                     </div>
                     <div class="md-col-6">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                                 <th>Image</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ( $orders->orderItems as $order )
                                 <tr>
                                    <td>{{ $order->products->name }}</td>
                                    <td>{{ $order->product_qty }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>
                                       <img src="{{ asset('assets/uploads/products/') .  $order->products->image }}" width="50px" alt="product image">
                                    </td>
                                    <td>
                                       <a href="{{ url('view-order/' . $order->id) }}" class="btn btn-primary">View</a>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection
