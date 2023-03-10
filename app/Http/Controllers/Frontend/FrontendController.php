<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HeadHome;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use App\Models\ThreeProduct;
use Auth;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $some_products = Product::where('trending', '1')->inRandomOrder()->limit(3)->get();
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        $static_head = HeadHome::first();
        $static_sec = ThreeProduct::first();
        return view('frontend.index', compact('featured_products', 'trending_category', 'some_products', 'static_head', 'static_sec'));
    }

    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }
    public function viewCategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $product = Product::where('cate_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'product'));
        } else {
            return redirect('/')->with('status', "Slug Doesn't Exisit");
        }
    }
    public function viewProduct($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {

            if (Product::where('slug', $prod_slug)->exists()) {

                $product = Product::where('slug', $prod_slug)->first();
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
        } else {
            return redirect('/')->with('status', "Category Not Found");
        }
    }

    public function productListAjax()
    {
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }

        return $data;
    }

    public function searchProduct(Request $request)
    {
        $search_product = $request->product_name;

        if ($search_product != '') {
            $product = Product::where("name", "LIKE", "%$search_product%")->first();
            if ($product) {
                return redirect('category/' . $product->category->slug . '/' . $product->slug);
            } else {
                return redirect()->back()->with('status', 'No Products Found!');
            }
        } else {
            return redirect()->back();
        }
    }
}
