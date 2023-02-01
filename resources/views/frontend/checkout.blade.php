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
                              <input type="text" class="form-control mt-1 fname" value="{{ Auth::user()->name }}" name="fname" id="firstName" placeholder="First Name">
                              <span id="fname_error" class="text-danger"></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="lastName">Last Name</label>
                              <input type="text" class="form-control mt-1 lname" value="{{ Auth::user()->lname }}" name="lname" id="lastName" placeholder="Last Name">
                              <span id="lname_error" class="text-danger"></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="email">Email</label>
                              <input type="email" class="form-control mt-1 email" value="{{ Auth::user()->email }}" name="email" id="email" placeholder="Email">
                              <span id="email_error" class="text-danger"></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="phone">Phone Number</label>
                              <input type="number" class="form-control mt-1 phone" value="{{ Auth::user()->phone }}" name="phone" id="phone" placeholder="Phone Number">
                              <span id="phone_error" class="text-danger"></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="adress1">Address 1</label>
                              <input type="text" class="form-control mt-1 address1" value="{{ Auth::user()->address1 }}" name="address1" id="adress1" placeholder="Adress 1">
                              <span id="address1_error" class="text-danger"></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="adress2">Address 2</label>
                              <input type="text" class="form-control mt-1 address2" value="{{ Auth::user()->address2 }}" name="address2" id="adress2" placeholder="Adress 2">
                              <span id="address2_error" class="text-danger"></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="country">Country</label>
                              <input type="text" class="form-control mt-1 country" value="{{ Auth::user()->country }}" name="country" id="country" placeholder="Country">
                              <span id="country_error" class="text-danger"></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="city">City</label>
                              <input type="text" class="form-control mt-1 city" value="{{ Auth::user()->city }}" name="city" id="city" placeholder="City">
                              <span id="city_error" class="text-danger"></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="state">State</label>
                              <input type="text" class="form-control mt-1 state" value="{{ Auth::user()->state }}" name="state" id="state" placeholder="State">
                              <span id="state_error" class="text-danger"></span>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label for="zipcode">Zip Code</label>
                              <input type="number" class="form-control mt-1 zipcode" value="{{ Auth::user()->zipcode }}" name="zipcode" id="zipcode" placeholder="Zip Code">
                              <span id="zipcode_error" class="text-danger"></span>
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
                        @if($cart_items->count() > 0)
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>Product</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php $total = 0; @endphp
                              @foreach ($cart_items as $item )
                              <tr>
                                    @php $total += ($item->products->selling_price) * ($item->product_qty); @endphp
                                    <td>{{ $item->products->name }}</td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>{{ $item->products->selling_price }}</td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <hr>
                        <h5>Grand Total: <span class="float-end">$ {{ $total }}</span></h5>
                        <hr>
                        <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" class="btn btn-primary w-100 my-3 py-2">Place Order || COD</button>
{{--                        <div id="paypal-button-container"></div>--}}
                        @else
                        <h3 class="text-center">Cart is Empty</h3>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
      </form>
   </div>
@endsection

@section('scripts')
   <script src="https://www.paypal.com/sdk/js?client-id=AQB3u2rldqP6v57XFqY8hJd5nZljNUWONdwWsFlnwwOF8V88d7PSccwecw1n-NwgHiCqEOEPMMwbVOJ0"></script>

   {{-- <script>
      paypal.Buttons({
         createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
               purchase_units: [{
               amount: {
                  value: '{{ $total }}'
               }
               }]
            });
         },
         onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
               // This function shows a transaction success message to your buyer.
               // alert('Transaction completed by ' + details.payer.name.given_name);

               var fname = $(".fname").val();
               var lname = $(".lname").val();
               var email = $(".email").val();
               var phone = $(".phone").val();
               var address1 = $(".address1").val();
               var address2 = $(".address2").val();
               var country = $(".country").val();
               var city = $(".city").val();
               var state = $(".state").val();
               var zipcode = $(".zipcode").val();

               $.ajax({
               method: "POST",
               url: "/place-order",
               data: {
                  'fname': fname,
                  'lname': lname,
                  'email': email,
                  'phone': phone,
                  'address1': address1,
                  'address2': address2,
                  'country': country,
                  'city': city,
                  'state': state,
                  'zipcode': zipcode,
                  'payment_mode': "Paid by PayPal",
                  'payment_id': details.id,
               }
               success: function (response) {
                  Swal.fire(response.status);
                  window.location.href = '/my-orders';
               },
            });
            });
         }
      }).render('#paypal-button-container');
//This function displays payment buttons on your web page.
   </script> --}}
@endsection
