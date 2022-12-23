<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function addToWishlist(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->productId;
            if (Product::find($prod_id)) {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => 'Product Added To Wishlist!']);
            } else {
                return response()->json(['status' => "Product doesn't Exist"]);
            }
        } else {
            return response()->json(['status' => 'Login To Continue']);
        }
    }

    public function removeItem(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->prod_id;
            if (Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wish = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $wish->delete();
                return response()->json(['status' => 'Product Removed Successfully!']);
            }
        } else {
            return response()->json(['status' => 'Login To Continue']);
        }
    }
}
