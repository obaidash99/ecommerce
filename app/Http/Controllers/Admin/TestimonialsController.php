<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index() {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $testimonial = new Testimonial();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/testimonials'), $filename);
            $testimonial->image = $filename;
        }

        $testimonial->name = $request->name;
        $testimonial->title = $request->title;
        $testimonial->description = $request->description;
        $testimonial->save();
        return redirect('/testimonials')->with('status', 'Testimonial Added Successfully');
    }

    public function add() {
        return view('admin.testimonial.add-testimonial');
    }


    public function edit($id) {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function destroy($id) {
        $testimonial = Testimonial::find($id);
        if ($testimonial->image) {
            $path = 'assets/uploads/testimonials/' . $testimonial->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $testimonial->delete();
        return redirect('testimonials')->with('status', 'Team Member Deleted Successfully!');
    }

    public function view($id){
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.view', compact('testimonial'));
    }
}
