<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Rating;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function add(Request $request) {
        $name = $request->name;
        $email = $request->email;

        Newsletter::create([
            'name' => $name,
            'email' => $email,
        ]);
        return redirect()->back()->with('status', 'Thank For Subscribing Our Newsletter!');
    }
}
