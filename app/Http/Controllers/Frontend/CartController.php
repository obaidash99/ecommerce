<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->productId;
        $product_qty = $request->productQty;

        if (Auth::check()) {

            $prod_check = Product::where('id', $product_id)->first();

            if ($prod_check) {

                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $prod_check->name . ' Already Added To Cart!']);
                } else {
                    $cart_item = new Cart();
                    $cart_item->user_id = Auth::id();
                    $cart_item->prod_id = $product_id;
                    $cart_item->product_qty = $product_qty;
                    $cart_item->save();
                    return response()->json(['status' => $prod_check->name . ' Added To Cart!']);
                }
            }
        } else {
            return response()->json(['status' => 'Login To Continue']);
        }
    }

    public function viewCart()
    {
        $cart_items = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cart_items'));
    }
    public function deleteProduct(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->prod_id;
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart_item = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart_item->delete();
                return response()->json(['status' => 'Product Removed Successfully!']);
            }
        } else {
            return response()->json(['status' => 'Login To Continue']);
        }
    }
    public function updateProduct(Request $request)
    {
        $prod_id = $request->prod_id;
        $product_qty = $request->product_qty;

        if (Auth::check()) {
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart_item = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart_item->product_qty = $product_qty;
                $cart_item->update();
                return response()->json(['status' => 'Product Quantity Updated Successfully!']);
            }
        } else {
            return response()->json(['status' => 'Login To Continue']);
        }
    }
}
