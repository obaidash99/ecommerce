<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Features_About;
use App\Models\StaticAbout;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index() {
        $team = Team::all();
        $testimonials = Testimonial::all();
        $features = Features_About::all();
        $static = StaticAbout::where('status', '1')->first();
        return view('frontend.about', compact('team', 'testimonials', 'features', 'static'));
    }
}
