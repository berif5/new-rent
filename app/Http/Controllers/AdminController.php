<?php

namespace App\Http\Controllers;

use App\Models\Lessor;
use App\Models\Product;
use App\Models\Review;
use App\Models\Rating;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $reviews = Rating::with('user')->get();
        $products = Product::all();
        $productCount = Product::count();
        $lessorCount = Lessor::count();
        $userCount = User::count();
        $categoryCount = User::count();
        return view('admin.layout1.index', compact('reviews','products','productCount','lessorCount','userCount','categoryCount'));
    }


}

