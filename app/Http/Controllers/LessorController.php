<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Lessor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LessorController extends Controller
{


    public function index()
{
    $lessor = Auth::id();
   
    $lessor = Lessor::where('id', $lessor)->first(); // Retrieve the lessor record based on the lessor ID
    if ($lessor) {
        $properties = Product::where('lessors_id', $lessor->id)->get();
        $categories = Category::all();
        //  dd($categories);
        return view('lessor.index', compact('lessor', 'properties', 'categories'));
    } else {
        // Handle the case where the authenticated user does not have a lessor record
        return redirect()->route('index')->with('error', 'You are not authorized as a lessor.');
    }
}

    

public function update(Request $request, Lessor $lessor)
    {
        $validatedData = $request->validate([
            // 'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required',
            // 'city' => 'required',
        ]);

        $lessor->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
