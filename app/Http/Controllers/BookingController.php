<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{


public function store(Request $request)
{

    $booking = new Booking();
    // $booking->user_id = $request->input('user_id');
    $booking->user_id = Auth::id();

    $booking->product_id = $request->input('product_id');
    $booking->start_date = $request->input('start_date');
    $booking->end_date = $request->input('end_date');
    // You may need to calculate the total price based on your business logic
    $booking->total_price = $request->input('total_price');
    $booking->booking_status = 'Pending'; // or any other default status

    $booking->save();

        // Retrieve the product ID and user ID from the request
        $productId = $request->input('product_id');
        // $userId = $request->input('user_id');
    
        // Update the product status in the database
        $product = Product::find($productId);
        $product->status = 1; // Set the status to 1 (or update it as needed)
        $product->save();
    // Optionally, you can redirect the user to a success page or perform any other action.
    
    // return redirect()->back()->with('success', 'Profile updated successfully.');
    return redirect()->back();

}

}
