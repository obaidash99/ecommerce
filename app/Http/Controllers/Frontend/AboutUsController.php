<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index() {
        $team = Team::all();
        return view('frontend.about', compact('team'));
    }
}
