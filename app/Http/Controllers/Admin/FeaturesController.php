<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Features_About;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    public function index() {
        $features = Features_About::all();
        return view('admin.features.index', compact('features'));
    }

    public function add() {
        return view('admin.features.add-feature');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|max:500',
            'image' => 'required|image|mimes:svg|dimensions:max_width=50,max_height=50'
        ]);

        $feature = new Features_About();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/features'), $filename);
            $feature->image = $filename;
        }

        $feature->title = $request->title;
        $feature->description = $request->description;
        $feature->save();
        return redirect('/features')->with('status', 'Feature Added Successfully');
    }

    public function edit($id) {
        $feature = Features_About::find($id);
        return view('admin.features.edit', compact('feature'));
    }

    public function update(Request  $request, $id) {
        $feature = Features_About::find($id);
        if($request->hasFile('image')) {
            $path = 'assets/uploads/features/' . $request->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/features'), $filename);
            $feature->image = $filename;
        }
        $feature->title = $request->title;
        $feature->description = $request->description;
        $feature->update();
        return redirect('features')->with('status', 'Feature Updated Successfully!');
    }


    public function destroy($id) {
        $feature = Features_About::find($id);
        if ($feature->image) {
            $path = 'assets/uploads/features/' . $feature->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $feature->delete();
        return redirect('features')->with('status', 'Feature Deleted Successfully!');
    }
}
