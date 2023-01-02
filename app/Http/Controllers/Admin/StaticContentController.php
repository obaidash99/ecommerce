<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeadAbout;
use Illuminate\Http\Request;

class StaticContentController extends Controller
{
    public function index() {
        $static_head = HeadAbout::all();
        return view('admin.static.index', compact('static_head'));
    }

    public function addHead() {
        return view('admin.static.add-head');
    }

    public function insertHead(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'heading' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:20|max:300',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'heading_btn_1' => 'required|string|min:3|max:50',
            'heading_btn_2' => 'required|string|min:3|max:50',
        ]);

        $static = new HeadAbout();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $static->image = $filename;
        }

        $static->status = $request->status;
        $static->heading = $request->heading;
        $static->description = $request->description;
        $static->heading_btn_1 = $request->heading_btn_1;
        $static->heading_btn_2 = $request->heading_btn_2;
        $static->save();
        return redirect('/static-content')->with('status', 'Content Added Successfully');
    }

}
