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
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.product.add', compact('category'));
    }

    public function insert(Request $request)
    {
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
        return redirect('/products')->with('status', 'Product Added Successfully');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

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
        return redirect('products')->with('status', 'Product Updated Successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            $path = 'assets/uploads/products/' . $product->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $product->delete();
        return redirect('products')->with('status', 'Product Deleted Successfully');
    }
}
