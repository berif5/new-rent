<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404); // Or handle the case when the user is not found
        }

        return view('user.profile', ['user' => $user]);
    }

    public function edit($id)
{
    $user = User::find($id);

    if (!$user) {
        abort(404); // Or handle the case when the user is not found
    }

    return view('user.edit', compact('user'));
}
public function update(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email'=>'required',
        'image'=>'required'
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user's information
    $user->name = $request->input('name');
    $user->address = $request->input('address');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->image = $request->input('image');

    $user->save();

    // Redirect back to the profile page
    return redirect()->route('user.profile', ['id' => $id])->with('success', 'Profile updated successfully.');
}


}

