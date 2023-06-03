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

        // Validate the request data
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'name_on_card' => 'required',
            'card_number' => 'required|digits_between:12,19',
            'cvc' => 'required',
            'expiration_month' => 'required',

        ]);

    $booking = new Booking();
    // $booking->user_id = $request->input('user_id');
    $booking->user_id = Auth::id();

    $booking->product_id = $request->input('product_id');
    $booking->start_date = $request->input('start_date');
    $booking->end_date = $request->input('end_date');
    // You may need to calculate the total price based on your business logic
    $booking->total_price = $request->input('total_price');


    $bookingData = [
        'name_on_card' => $validatedData['name_on_card'],
        'card_number' => $validatedData['card_number'],
        'cvc' => $validatedData['cvc'],
        'expiration_month' => $validatedData['expiration_month'],
    ];

    // $booking->name_on_card = $validatedData['name_on_card'];
    // $booking->card_number = $validatedData['card_number'];
    // $booking->cvc = $validatedData['cvc'];
    // $booking->expiration_month = $validatedData['expiration_month'];
    // $booking->expiration_year = $validatedData['expiration_year'];


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
    // return redirect()->back();
    return redirect()->back()->with('success', 'Booking created successfully.');


}

}
