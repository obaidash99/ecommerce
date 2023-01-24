<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'slug' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:20|max:300',
            'meta_title' => 'required|string|min:3|max:100',
            'meta_desc' => 'required|string|min:20|max:300',
            'meta_keywords' => 'required|string|min:20|max:300',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $category = new Category();
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/category/'), $filename);
            $category->image = $filename;
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == true ? '1' : '0';
        $category->popular = $request->popular == true ? '1' : '0';
        $category->meta_title = $request->meta_title;
        $category->meta_desc = $request->meta_desc;
        $category->meta_keywords = $request->meta_keywords;

        $category->save();
        return redirect()->route('categories.index')->with('status', 'Category Added Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'slug' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:20|max:300',
            'meta_title' => 'required|string|min:3|max:100',
            'meta_desc' => 'required|string|min:20|max:300',
            'meta_keywords' => 'required|string|min:20|max:300',
        ]);

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/category/' . $category->image;
            if (file_exists($path)) {
                unlink($path);
            }

            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/category/'), $filename);
            $category->image = $filename;
        }
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == true ? '1' : '0';
        $category->popular = $request->popular == true ? '1' : '0';
        $category->meta_title = $request->meta_title;
        $category->meta_desc = $request->meta_desc;
        $category->meta_keywords = $request->meta_keywords;
        $category->update();
        return redirect()->route('categories.index')->with('status', 'Category Updated Successfully');
    }

    public function show(Category $category)
    {
        if ($category->image) {
            $path = 'assets/uploads/category/' . $category->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'Category Deleted Successfully');
    }
}
