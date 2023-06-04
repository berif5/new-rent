<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reviews = Review::with('user')->get();
        $products = Product::all();

        return view('admin.layout1.index', compact('reviews','products'));
    }

    
}

