<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::where('trending', '1')->inRandomOrder()->paginate(12);
        $category = Category::where('status', '0')->get();
        return view('frontend.products.all', compact('products', 'category'));
    }

    public function viewProduct($slug)
    {
            if (Product::where('slug', $slug)->exists()) {

                $product = Product::where('slug', $slug)->first();
                $rating = Rating::where('prod_id', $product->id)->get();
                $rating_sum = Rating::where('prod_id', $product->id)->sum('stars_rated');
                $user_rating = Rating::where('prod_id', $product->id)->where('user_id', Auth::id())->first();
                $reviews = Review::where('prod_id', $product->id)->get();

                if ($rating->count()) {
                    $rating_value = $rating_sum / $rating->count();
                } else {
                    $rating_value = 0;
                }

                return view('frontend.products.view', compact('product', 'rating', 'rating_value', 'user_rating', 'reviews'));
            } else {
                return redirect('/')->with('status', "Product Not Found");
            }

    }

}
