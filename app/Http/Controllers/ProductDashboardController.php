<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Lessor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ProductDashboardController extends Controller
{
    public function index()
    {   $products = Product::all();
        $products = Product::paginate(4);
        // $rentedproductCount = $this->getRentedproductCount();
        // $productCount = Product::count();

        $categories = Category::all();
        return view('admin.productdashboard.index', compact('products'));
    }

    public function show($id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('productdashboard.index')->with('error', 'Product not found');
    }

    return view('admin.productdashboard.show', compact('product'));
}

    public function create()
{
    $lessors = Lessor::all();
    $categories = Category::all();
    $product = new Product();
    return view('admin.productdashboard.create', compact('product', 'categories'));
}
public function store(Request $request)
{
    $product = new Product();
    $product->product_name = $request->input('product_name');
    $product->product_description = $request->input('product_description');
    $product->product_price = $request->input('product_price');
    $product->status = $request->input('status');
    $product->product_type = $request->input('product_type');
    $product->category_id = $request->input('category');
    $product->lessor_id = $request->input('lessors_id');


    $product->save();

    return redirect()->route('productdashboard.create', $product->id)
        ->with('success', 'Product created successfully');
}


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.productdashboard.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
    $product->product_name = $request->input('product_name');
    $product->product_description = $request->input('product_description');
    $product->product_price = $request->input('product_price');
    $product->status = $request->input('status');
    $product->product_type = $request->input('product_type');
    $product->category_id = $request->input('category_id');
    $product->image1 = $request->input('image1');
    $product->image2 = $request->input('image2');
    $product->image3 = $request->input('image3');

    $product->save();


        $product->save();

        return redirect()->route('admin.productdashboard.index', $product->id)
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
