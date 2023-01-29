<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footers;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footers::first();
        return view('admin.static.footer.index', compact('footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.static.footer.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:50',
            'description' => 'required|string|min:20|max:300',
            'main_image' => 'required|image|mimes:jpeg,png,jpg',
            'social_1_link' => 'required|string|min:3|max:50',
            'social_1_img' => 'required|image|mimes:jpeg,png,jpg',
            'social_2_link' => 'required|string|min:3|max:50',
            'social_2_img' => 'required|image|mimes:jpeg,png,jpg',
            'social_3_link' => 'required|string|min:3|max:50',
            'social_3_img' => 'required|image|mimes:jpeg,png,jpg',
            'social_4_link' => 'required|string|min:3|max:50',
            'social_4_img' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $footer = new Footers();

        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $footer->main_image = $filename;
        }
        if ($request->hasFile('social_1_img')) {
            $file = $request->file('social_1_img');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $footer->social_1_img = $filename;
        }
        if ($request->hasFile('social_2_img')) {
            $file = $request->file('social_2_img');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $footer->social_2_img = $filename;
        }
        if ($request->hasFile('social_3_img')) {
            $file = $request->file('social_3_img');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $footer->social_3_img = $filename;
        }
        if ($request->hasFile('social4_img')) {
            $file = $request->file('social_4_img');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/static'), $filename);
            $footer->social_4_img = $filename;
        }

        $footer->title = $request->title;
        $footer->description = $request->description;
        $footer->social_1_link = $request->social_1_link;
        $footer->social_2_link = $request->social_2_link;
        $footer->social_3_link = $request->social_3_link;
        $footer->social_4_link = $request->social_4_link;
        $footer->save();
        return redirect()->router('footer.index')->with('status', 'Content Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
