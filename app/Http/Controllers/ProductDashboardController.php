<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.productdashboard.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.productdashboard.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.productdashboard.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->email = $request->input('email');
        $product->password = $request->input('password');
        $product->phone_number = $request->input('phone_number');
        $product->address = $request->input('address');
        $product->city = $request->input('city');
        $product->image = $request->input('image');


        $product->save();

        return redirect()->route('productashboard.show', $product->id)
            ->with('success', 'product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('productdashboard.index')
            ->with('success', 'product deleted successfully');
    }
}
