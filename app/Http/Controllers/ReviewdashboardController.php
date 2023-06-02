<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
class ReviewdashboardController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
         $user = User::all();
        return view('admin.reviewdashboard.index', compact('reviews','user'));
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);
        $user = User::findOrFail($review->user_id); // Assuming the user_id is stored in the review model

        return view('admin.reviewdashboard.show', compact('review', 'user'));
    }


    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviewdashboard.index')->with('success', 'Comment deleted successfully');
    }

}
