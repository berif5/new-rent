<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index(Request $request)
    {


        $category = $request->input('category_id ');
        $type = $request->input('status');
        $startPrice = Product::min('product_price');
        $endPrice = Product::max('product_price');

        $query = Product::query();

        if ($category) {
            $query->where('category_id ', $category);
        }

        if ($type) {
            $query->where('status', $type);
        }

        if ($startPrice && $endPrice) {
            $query->whereBetween('product_price', [$startPrice, $endPrice]);
        }

        $products = $query->get();
        $categories = Category::all();

        return view('vehicle', compact('products','categories'));
    }

    public function singleproduct($product_id)
{
    $product = Product::find($product_id);

    return view('singleproduct', ['product' => $product]);
}
    // public function show($id)
    // {
    //     $product = Product::find($id);

    //     if (!$product) {
    //         abort(404, 'Product not found'); // Handle the case when the product is not found
    //     }

    //     return view('singleproduct', ['product' => $product]);
    // }



    public function show($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('singleproduct', compact('product'));
    }
    // public function submitRating(Request $request)
    // {
    //     $review = new Review;
    //     $review->user_name = $request->input('user_id');
    //     $review->user_rating = $request->input('rating');
    //     $review->user_review = $request->input('review_text');
    //     $review->datetime = time();
    //     $review->save();

    //     return "Your Review & Rating Successfully Submitted";
    // }

    // public function getRatings(Request $request)
    // {
    //     $reviews = Review::orderBy('review_id', 'DESC')->get();
    //     $average_rating = $reviews->avg('user_rating');
    //     $total_review = $reviews->count();
    //     $five_star_review = $reviews->where('user_rating', 5)->count();
    //     $four_star_review = $reviews->where('user_rating', 4)->count();
    //     $three_star_review = $reviews->where('user_rating', 3)->count();
    //     $two_star_review = $reviews->where('user_rating', 2)->count();
    //     $one_star_review = $reviews->where('user_rating', 1)->count();

    //     $review_content = [];

    //     foreach ($reviews as $review) {
    //         $review_content[] = [
    //             'user_name' => $review->user_name,
    //             'user_review' => $review->user_review,
    //             'rating' => $review->user_rating,
    //             'datetime' => date('l jS, F Y h:i:s A', $review->datetime),
    //         ];
    //     }

    //     $output = [
    //         'average_rating' => number_format($average_rating, 1),
    //         'total_review' => $total_review,
    //         'five_star_review' => $five_star_review,
    //         'four_star_review' => $four_star_review,
    //         'three_star_review' => $three_star_review,
    //         'two_star_review' => $two_star_review,
    //         'one_star_review' => $one_star_review,
    //         'review_data' => $review_content,
    //     ];

    //     return response()->json($output);
    // }


}
