<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function storeMessage(Request $request) {
        $request->validate([
            'fname' => 'required|string|min:3|max:30',
            'lname' => 'required|string|min:3|max:30',
            'email' => 'required|email',
            'subject' => 'required|string|max:100',
            'content' => 'required|max:1000',
        ]);

        Message::create($request->all());

        return redirect()->back()->with('status', 'Thank You For Reaching Out, We Will Get Back To You Soon!');
    }
}
