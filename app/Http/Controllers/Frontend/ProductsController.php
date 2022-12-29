<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::where('trending', '1')->inRandomOrder()->paginate(12);
        $category = Category::where('status', '0')->get();
        return view('frontend.products.all', compact('products', 'category'));
    }
}
