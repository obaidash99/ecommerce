<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index() {
        $messages =  Message::paginate(8);
        return view('admin.messages.index', compact('messages'));
    }

    public function view($id) {
        $message = Message::where('id', $id)->first();
        return view('admin.messages.view', compact('message'));
    }

    public function destroy($id) {
        Message::find($id)->delete();
        return redirect('messages')->with('status', 'Message Deleted Successfully!');

    }
}
