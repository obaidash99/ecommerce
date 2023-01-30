<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.view', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function destroy($id) {
        $user = User::find($id);
        if ($user->image) {
            $path = 'assets/uploads/users/' . $user->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User Deleted Successfully!');
    }
}
