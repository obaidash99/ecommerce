<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeadHome;
use App\Models\ThreeProduct;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    public function index() {
        $static_head = HeadHome::first();
        $static_sec = ThreeProduct::first();
        return view('admin.static.home.index', compact('static_head', 'static_sec'));
    }

    public function addHead() {
        return view('admin/static/home/add-home-head');
    }

    public function insertHead(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:20|max:300',
            'btn_1_content' => 'required|string|min:3|max:50',
            'btn_2_content' => 'required|string|min:3|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $static = new HeadHome();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $static->image = $filename;
        }

        $static->title = $request->title;
        $static->description = $request->description;
        $static->btn_1_content = $request->btn_1_content;
        $static->btn_2_content = $request->btn_2_content;
        $static->save();
        return redirect('/home-head')->with('status', 'Content Added Successfully');
    }

    public function editHead($id) {
        $static_head = HeadHome::find($id);
        return view('admin/static/home/edit-home-head', compact('static_head'));
    }

    public function updateHead(Request  $request, $id) {
        $static_head = HeadHome::find($id);
        if($request->hasFile('image')) {
            $path = 'assets/uploads/static/' . $request->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $static_head->image = $filename;
        }

        $static_head->title = $request->title;
        $static_head->description = $request->description;
        $static_head->btn_1_content = $request->btn_1_content;
        $static_head->btn_2_content = $request->btn_2_content;
        $static_head->update();
        return redirect('home-head')->with('status', 'Content Updated Successfully!');
    }

    public function destroy($id) {
        $item = HeadHome::find($id);
        if ($item->image) {
            $path = 'assets/uploads/static/' . $item->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $item->delete();
        return redirect('home-head')->with('status', 'Content Deleted Successfully!');
    }

    public function addSec() {
        return view('admin/static/home/add-home-sec');
    }

    public function insertSec(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:20|max:300',
            'btn_content' => 'required|string|min:3|max:50',
        ]);

        $static_sec = new ThreeProduct();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $static_sec->image = $filename;
        }

        $static_sec->title = $request->title;
        $static_sec->description = $request->description;
        $static_sec->btn_content = $request->btn_content;
        $static_sec->save();
        return redirect('/home-head')->with('status', 'Content Added Successfully');
    }

    public function editSec($id) {
        $static_sec = ThreeProduct::find($id);
        return view('admin/static/home/edit-home-sec', compact('static_sec'));
    }

    public function updateSec(Request  $request, $id) {
        $static_sec = ThreeProduct::find($id);
        if($request->hasFile('image')) {
            $path = 'assets/uploads/static/' . $request->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $static_sec->image = $filename;
        }

        $static_sec->title = $request->title;
        $static_sec->description = $request->description;
        $static_sec->btn_content = $request->btn_content;
        $static_sec->update();
        return redirect('home-head')->with('status', 'Content Updated Successfully!');
    }
}
