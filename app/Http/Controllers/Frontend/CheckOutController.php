<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {
        $old_cart_items = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cart_items as $item) {
            if (!(Product::where('id', $item->products->id)->where('qty', '>=', $item->product_qty)->exists())) {
                $remove_item = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $remove_item->delete();
            }
        }

        $cart_items = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cart_items'));
    }
    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->fname;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->adress1 = $request->address1;
        $order->adress2 = $request->address2;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->zipcode = $request->zipcode;

        $order->payment_mode = $request->payment_mode;
        $order->payment_id = $request->payment_id;

        $total = 0;
        $cart_items_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cart_items_total as $prod) {
            $total = $total + ($prod->products->selling_price);
        }
        $order->total_price = $total;

        $order->tracking_no = $request->fname . rand(111, 9999);
        $order->save();

        $cart_items = Cart::where('user_id', Auth::id())->get();
        foreach ($cart_items as $item) {
            OrderItems::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->product_qty,
                'price' => $item->products->selling_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty -= $item->product_qty;
            $prod->update();
        }

        if (Auth::user()->address1 == NULL) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->fname;
            $user->lname = $request->lname;
            // $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address1 = $request->address1;
            $user->address2 = $request->address2;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->zipcode = $request->zipcode;
            $user->update();
        }

        $cart_items = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cart_items);


        if ($request->payment_mode == "Paid by PayPal") {
            return response()->json(['status' => 'Order Placed Successfully!']);
        } else {
            return redirect('/')->with('status', 'Order Placed Successfully!');
        }

        // return redirect('/')->with('status', 'Order Placed Successfully!');
    }

    public function razorpayCheck(Request $request)
    {
        $cart_items = Cart::where('user_id', Auth::id())->get();

        $total_price = 0;
        foreach ($cart_items as $item) {
            $total_price += $item->products->selling_price * $item->product_qty;
        }

        $fname = $request->fname;
        $lname = $request->lname;
        $email = $request->email;
        $phone = $request->phone;
        $address1 = $request->address1;
        $address2 = $request->address2;
        $country = $request->country;
        $city = $request->city;
        $state = $request->state;
        $zipcode = $request->zipcode;

        return response()->json([
            "fname" => $fname,
            "lname" => $lname,
            "email" => $email,
            "phone" => $phone,
            "address1" => $address1,
            "address2" => $address2,
            "country" => $country,
            "city" => $city,
            "state" => $state,
            "zipcode" => $zipcode,
            "total_price" => $total_price,
        ]);
    }
}
