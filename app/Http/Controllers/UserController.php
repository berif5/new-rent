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
        'image' => 'image',
        'password'=>'required',
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user's information
    $user->name = $request->input('name');
    $user->address = $request->input('address');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    // $user->image = $request->input('image');
    $user->password = $request->input('password');
// Handle the image upload
// if ($request->hasFile('image')) {
//     $image = $request->file('image');
//     $filename = time() . '_' . $image->getClientOriginalName();
//     $image->move(public_path('images'), $filename);

//     // Save the image file path or filename to the user model
//     $user->image = 'images/' . $filename;
// }
$image = $request->file('image');
$imagePath = $this->storeImage($image);
$user->image = $imagePath;

    $user->save();

    // Redirect back to the profile page
    return redirect()->route('user.profile', ['id' => $id])->with('success', 'Profile updated successfully.');
}
private function storeImage($file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('images'), $filename);
        return $filename;
    }

}

