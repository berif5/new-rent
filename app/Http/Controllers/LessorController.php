<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Lessor;
use Illuminate\Http\Request;

class LessorController extends Controller
{


public function index(Lessor $lessor)
{
    $lessor = Lessor::first(); // Retrieve the first record from the lessors table
    $properties = $lessor->products;
    $categories = Category::all();

    return view('lessor.index', compact('lessor','properties','categories'));
}

public function update(Request $request, Lessor $lessor)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $lessor->update($validatedData);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
