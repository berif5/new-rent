<?php



namespace App\Http\Controllers;
use App\Models\Review;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
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
