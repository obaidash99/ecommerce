<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {
        $team = Team::paginate(10);
        return view('admin.static.team', compact('team'));
    }
    public function add() {
        return view('admin.static.add-member');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|max:500',
            'btn_text' => 'required|string|min:3|max:20',
            'image' => 'required'
        ]);

        $team = new Team();
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/team'), $filename);
            $team->image = $filename;
        }

        $team->name = $request->name;
        $team->title = $request->title;
        $team->description = $request->description;
        $team->btn_text = $request->btn_text;
        $team->save();
        return redirect('/team')->with('status', 'Team Member Added Successfully');
    }
}
