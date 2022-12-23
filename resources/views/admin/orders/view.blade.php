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
                  <h4 class="text-center">
                     View Order
                     <a href="{{url('orders')}}" class="btn btn-warning text-white float-end">Back</a>
                  </h4>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6 order-details">
                        <h4>Shipping Details</h4>
                        <hr/>
                        <label for="">First Name</label>
                        <div class="border">{{ $orders->fname }}</div>
                        <label for="">Last Name</label>
                        <div class="border">{{ $orders->lname }}</div>
                        <label for="">Email</label>
                        <div class="border">{{ $orders->email }}</div>
                        <label for="">Phone Number</label>
                        <div class="border">{{ $orders->phone }}</div>
                        <label for="">Shipping Address</label>
                        <div class="border">{{ $orders->adress1 }}, <br/> {{ $orders->adress2 }}, <br/> {{ $orders->city }}, {{ $orders->state }}, {{ $orders->country }}</div>
                        <label for="">Zip Code</label>
                        <div class="border">{{ $orders->zipcode }}</div>
                     </div>
                     <div class="col-md-6">
                        <h4>Order Details</h4>
                        <hr/>
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
                                    <td>{{ $order->qty }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>
                                       <img src="{{ asset('assets/uploads/products/' .  $order->products->image) }}" width="50px" alt="product image">
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <h4 class="px-2">Grand Total:<span class="float-end">$ {{ $orders->total_price }}</span></h4>

                        <div class="form-floating mt-3 px-2 order-details">
                           <form action="{{ url('update-order/' . $orders->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <label for="floatingSelect">Order Status</label>
                              <select class="form-select" id="floatingSelect" name="order_status">
                                 <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">In Proccess</option>
                                 <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed</option>
                              </select>
                              <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                           </form>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

@endsection
