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
                  <h4 class="text-center">My Orders</h4>
               </div>
               <div class="card-body">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Order Date</th>
                           <th>Tracking Number</th>
                           <th>Total Price</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ( $orders as $order )
                           <tr>
                              <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                              <td>{{ $order->tracking_no }}</td>
                              <td>{{ $order->total_price}}</td>
                              <td>{{ $order->status == '0' ? 'In Process' : 'Completed'}}</td>
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

@endsection
