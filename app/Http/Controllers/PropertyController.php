<?php

namespace App\Http\Controllers;

use App\Models\Lessor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_price' => 'required|numeric',
            'status' => 'required',
            'product_type' => 'required',
            'category' => 'required',
            'image1' => 'required|image',
            'image2' => 'required|image',
            'image3' => 'required|image',
        ]);

        $product = new Product();
        $product->product_name = $validatedData['product_name'];
        $product->product_description = $validatedData['product_description'];
        $product->product_price = $validatedData['product_price'];
        $product->status = $validatedData['status'];
        $product->product_type = $validatedData['product_type'];
        $product->category_id = $validatedData['category'];
        $product->lessor_id = Auth::id();

        // Image 1
        $image1 = $request->file('image1');
        $image1Path = $this->storeImage($image1);
        $product->image1 = $image1Path;

        // Image 2
        $image2 = $request->file('image2');
        $image2Path = $this->storeImage($image2);
        $product->image2 = $image2Path;

        // Image 3
        $image3 = $request->file('image3');
        $image3Path = $this->storeImage($image3);
        $product->image3 = $image3Path;

        $product->save();

        return redirect()->route('lessor.index')->with('success', 'Property created successfully.');
    }

    private function storeImage($file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move(public_path('images'), $filename);
        return $filename;
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
    public function edit($id)
    {
        $property = Product::findOrFail($id);

        // Add any additional data that you need to pass to the edit view

        return view('property.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'product_name' => 'required',
        'product_description' => 'required',
        'product_price' => 'required',
        'status' => 'required',
    ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('lessor.index')->with('success', 'Product updated successfully');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $property = Product::findOrFail($id);

        // Perform any necessary checks or validations before deleting the property

        $property->delete();

        return redirect()->route('lessor.index')->with('success', 'Property deleted successfully');
    }
}
