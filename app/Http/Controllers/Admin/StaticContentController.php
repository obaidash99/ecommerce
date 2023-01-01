<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StaticAbout;
use Illuminate\Http\Request;

class StaticContentController extends Controller
{
    public function index() {
        $static = StaticAbout::all();
        return view('admin.static.index', compact('static'));
    }

    public function add() {
        return view('admin.static.add');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'heading_title' => 'required|string|min:3|max:50',
            'heading_desc' => 'required|max:300',
            'heading_image' => 'required|image|mimes:jpeg,png,jpg',
            'heading_btn_1' => 'string',
            'heading_btn_2' => 'string',
            'why_us_title' => 'required|string|min:3|max:50',
            'why_us_desc' => 'required|max:300',
            'why_us_image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $static = new StaticAbout();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $static->image = $filename;
        }

        $static->name = $request->name;
        $static->title = $request->title;
        $static->description = $request->description;
        $static->save();
        return redirect('/testimonials')->with('status', 'Content Added Successfully');
    }

}
