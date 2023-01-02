<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeadAbout;
use App\Models\WhyAbout;
use Illuminate\Http\Request;

class StaticContentController extends Controller
{
    public function index() {
        $static_head = HeadAbout::all();
        $static_why = WhyAbout::all();
        return view('admin.static.index', compact('static_head', 'static_why'));
    }

    public function addHead() {
        return view('admin.static.add-head');
    }

    public function addWhy() {
        return view('admin.static.add-why');
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

    public function insertWhy(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'heading' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:20|max:300',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $static_why = new WhyAbout();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $static_why->image = $filename;
        }

        $static_why->status = $request->status;
        $static_why->heading = $request->heading;
        $static_why->description = $request->description;
        $static_why->save();
        return redirect('/static-content')->with('status', 'Content Added Successfully');
    }

    public function destroyAbout($id) {
        $item = HeadAbout::find($id);
        if ($item->image) {
            $path = 'assets/uploads/static/' . $item->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $item->delete();
        return redirect('static-content')->with('status', 'Content Deleted Successfully!');
    }

    public function destroyWhy($id) {
        $item = WhyAbout::find($id);
        if ($item->image) {
            $path = 'assets/uploads/static/' . $item->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $item->delete();
        return redirect('static-content')->with('status', 'Content Deleted Successfully!');
    }

    public function view($id){
        $member = Team::find($id);
        return view('admin.team.view', compact('member'));
    }

}
