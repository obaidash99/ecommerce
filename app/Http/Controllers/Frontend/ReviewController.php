<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Auth;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function add($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();

        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            } else {
                $verfied_purchase = Order::where("orders.user_id", Auth::id())
                    ->join('order_items', 'order_id', 'order_items.order_id')
                    ->where('order_items.prod_id', $product_id)->get();
                return view('frontend.reviews.index', compact('product', 'verfied_purchase'));
            }
        } else {
            return redirect()->back()->with('status', 'Link is Broken!');
        }
    }

    public function create(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::where('id', $product_id)->where('status', '0')->first();
        if ($product) {
            $user_review = $request->user_review;
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'prod_id' => $product_id,
                'user_review' => $user_review,
            ]);

            $category_slug = $product->category->slug;
            $product_slug = $product->slug;

            if ($new_review) {
                return redirect('category/' . $category_slug . '/' . $product_slug)->with("status", 'Thank You for the Review!');
            }
        } else {
            return redirect()->back()->with('status', 'Link is Broken!');
        }
    }

    public function edit($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();

        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('prod_id', $product_id)->first();
            if ($review) {
                return view('frontend.reviews.edit', compact('review'));
            } else {
                return redirect()->back()->with('status', 'Link is Broken!');
            }
        } else {
            return redirect()->back()->with('status', 'Link is Broken!');
        }
    }

    public function update(Request $request)
    {
        $user_review = $request->user_review;
        if ($user_review != '') {
            $review_id = $request->review_id;
            $review = Review::Where('id', $review_id)->where('user_id', Auth::id())->first();

            if ($review) {
                $review->user_review = $request->user_review;
                $review->update();
                return redirect('category/' . $review->product->category->slug . '/' . $review->product->slug)->with('status', 'Updated Successfully!');
            }
        } else {
            return redirect()->back()->with('status', 'You Can Not Submit Empty Review!');
        }
    }
}
