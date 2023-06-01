<?php

namespace App\Http\Controllers;

use App\Models\Lessor;
use App\Models\Product;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('property.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Lessor $lessor)
{
    $validatedData = $request->validate([
        'product_name' => 'required',
        'product_description' => 'required',
        'product_price' => 'required|numeric',
        // Add validation rules for other property fields
    ]);

    // Save the uploaded images and get their paths
    $imagePaths = [];
    for ($i = 1; $i <= 3; $i++) {
        if ($request->hasFile('image' . $i)) {
            $image = $request->file('image' . $i);
            $imageName = time() . '_image' . $i . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePaths[] = $imageName;
        }
    }

    // Create a new property using the validated data and image paths
    $property = Product::create([
        'product_name' => $validatedData['product_name'],
        'product_description' => $validatedData['product_description'],
        'product_price' => $validatedData['product_price'],
        'status' => $request->input('status'), // Use the selected value from the form
        // 'product_type' => $validatedData['product_type'], // Adjust the field name as per your form
        'product_type' => $request->input('product_type'),
        'category_id' => $request->input('category'),
        'image1' => $request->input('image1'),
        'image2' => $request->input('image2'),
        'image3' => $request->input('image3'),
        'lessor_id' => $lessor->id, // Assign the id of the $lessor object
        // 'category_id' => $validatedData['category'], // Adjust the field name as per your form
        // 'image1' => isset($imagePaths[0]) ? $imagePaths[0] : null,
        // 'image2' => isset($imagePaths[1]) ? $imagePaths[1] : null,
        // 'image3' => isset($imagePaths[2]) ? $imagePaths[2] : null,
    ]);

    // Perform any additional actions if needed

    return redirect()->route('lessor.index')->with('success', 'Property created successfully.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
