<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(Request $request)
    {
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
        return redirect('/categories')->with('status', 'Category Added Successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

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
        return redirect('/categories')->with('status', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = 'assets/uploads/category/' . $category->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $category->delete();
        return redirect('/categories')->with('status', 'Category Deleted Successfully');
    }
}
