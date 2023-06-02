<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the selected values from the request
        $categoryId = $request->input('category');
        $status = $request->input('status');
        // $price = $request->input('price');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        // Query the products based on the selected criteria
        $products = Product::query();

        if ($categoryId) {
            $products->where('category_id', $categoryId);
        }

        if ($status === '1') {
            $products->where('status', true);
        } elseif ($status === '0') {
            $products->where('status', false);
        }

        if ($minPrice && $maxPrice) {
            $products->whereBetween('product_price', [$minPrice, $maxPrice]);
        }
        // ... add more conditions based on your requirements

        $products = $products->get();
        $categories = Category::all();

        // Return the updated gallery section HTML using a view
        return view('index', compact('products','categories'));
    }
}
