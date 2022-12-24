<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function add(Request $request)
    {
        $stars_rated = $request->product_rating;
        $product_id = $request->product_id;

        $product_check = Product::where('id', $product_id)->where('status', '0')->first();

        if ($product_check) {
            $verfied_purchase = Order::where("orders.user_id", Auth::id())
                ->join('order_items', 'order_id', 'order_items.order_id')
                ->where('order_items.prod_id', $product_id)->get();

            if ($verfied_purchase->count() > 0) {

                $existing_rating = Rating::where('user_id', Auth::id())->where('prod_id', $product_id)->first();

                if ($existing_rating) {
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->update();
                } else {
                    Rating::create([
                        'user_id' => Auth::id(),
                        'prod_id' => $product_id,
                        'stars_rated' => $stars_rated,
                    ]);
                }

                return redirect()->back()->with('status', 'Thank You For Rating This Product');
            } else {
                return redirect()->back()->with('status', 'You Should Buy the product to Rate it!');
            }
        } else {
            return redirect()->back()->with('status', 'Link is Broken!');
        }
    }
}
