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
}
