<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cate_id' => 'required',
            'name' => 'required|string|min:5|max:100',
            'slug' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:20|max:300',
            'small_description' => 'required|string|min:20|max:300',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'tax' => 'required|numeric',
            'qty' => 'required|numeric',
//            'status' => 'required',
//            'trending' => 'required',
            'meta_title' => 'required|string|min:3|max:100',
            'meta_desc' => 'required|string|min:20|max:300',
            'meta_keywords' => 'required|string|min:20|max:300',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $product = new Product();
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/products'), $filename);
            $product->image = $filename;
        }

        $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->tax = $request->tax;
        $product->qty = $request->qty;
        $product->status = $request->status == true ? '1' : '0';
        $product->trending = $request->trending == true ? '1' : '0';
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        $product->save();
        return redirect()->route('products.index')->with('status', 'Product Added Successfully');
    }

    public function edit(Product $product)
    {
//        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
//            'cate_id' => 'required',
            'name' => 'required|string|min:5|max:100',
            'slug' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:20|max:300',
            'small_description' => 'required|string|min:20|max:300',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'tax' => 'required|numeric',
            'qty' => 'required|numeric',
//            'status' => 'required',
//            'trending' => 'required',
            'meta_title' => 'required|string|min:3|max:100',
            'meta_description' => 'required|string|min:20|max:300',
            'meta_keywords' => 'required|string|min:20|max:300',
        ]);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/products/' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }

            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/products'), $filename);
            $product->image = $filename;
        }

        // $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->tax = $request->tax;
        $product->qty = $request->qty;
        $product->status = $request->status == true ? '1' : '0';
        $product->trending = $request->trending == true ? '1' : '0';
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->update();
        return redirect()->route('products.index')->with('status', 'Product Updated Successfully');
    }

    public function show(Product $product)
    {
//        $product = Product::find($id);
        if ($product->image) {
            $path = 'assets/uploads/products/' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $product->delete();
        return redirect()->route('products.index')->with('status', 'Product Deleted Successfully!');
    }
}
