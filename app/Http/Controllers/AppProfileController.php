<?php

namespace App\Http\Controllers;
   use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AppProfileController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $users = User::where('id', $userId)->get();

        return view('admin.layout1.profile', compact('users'));
    }

    public function update(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'nullable|image|max:2048', // Assuming it's an image upload field
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Update the user's name and email
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('profile-images', 'public');
            $user->image = $imagePath;
        }

        // Save the updated user details
        $user->save();

        // Redirect the user to a success page or back to the profile page
        return redirect()->route('appProfile')->with('success', 'Profile updated successfully');
    }
}
