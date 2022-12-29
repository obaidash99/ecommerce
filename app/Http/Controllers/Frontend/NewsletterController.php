<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Rating;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function add(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email',
        ]);

        Newsletter::create($request->all());

        return redirect()->back()->with('status', 'Thank For Subscribing Our Newsletter!');
    }

    public function view(){
        $newsletters = Newsletter::all();
        return view('admin.newsletters.view', compact('newsletters'));
    }
}
