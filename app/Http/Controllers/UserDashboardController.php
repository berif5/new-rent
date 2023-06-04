<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {$users = User::paginate(4);
        // $users = User::all();
        return view('admin.userdashboard.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.userdashboard.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.userdashboard.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->image = $request->input('image');


        $user->save();

        return redirect()->route('userdashboard.show', $user->id)
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('userdashboard.index')
            ->with('success', 'User deleted successfully');
    }



}
