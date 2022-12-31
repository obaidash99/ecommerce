<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index() {
        $team = Team::paginate(10);
        return view('admin.team.index', compact('team'));
    }

    public function add() {
        return view('admin.team.add-member');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'title' => 'required|string|min:3|max:30',
            'description' => 'required|max:500',
            'btn_text' => 'required|string|min:3|max:20',
            'image' => 'required|image|mimes:jpeg,png,jpg'
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

    public function edit($id) {
        $member = Team::find($id);
        return view('admin.team.edit', compact('member'));
    }

    public function update(Request  $request, $id) {
        $member = Team::find($id);
        if($request->hasFile('image')) {
            $path = 'assets/uploads/team/' . $request->image;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('assets/uploads/team'), $filename);
            $member->image = $filename;
        }

        $member->name = $request->name;
        $member->title = $request->title;
        $member->description = $request->description;
        $member->update();
        return redirect('team')->with('status', 'Member Details Updated Successfully!');
    }

    public function destroy($id) {
        $member = Team::find($id);
        if ($member->image) {
            $path = 'assets/uploads/products/' . $member->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $member->delete();
        return redirect('team')->with('status', 'Team Member Deleted Successfully!');
    }

    public function view($id){
        $member = Team::find($id);
        return view('admin.team.view', compact('member'));
    }
}
