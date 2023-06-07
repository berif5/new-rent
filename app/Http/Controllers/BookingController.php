<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class BookingController extends Controller
{

    //  I changed booked_dates to status
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'start_date' => 'required|date|after:now',
        'end_date' => 'required|date|after:start_date',
        "num_of_days",
        'product_price',
        'name_on_card' => 'required',
        'total_price',
        'card_number' => 'required|digits_between:12,19',
        'expiration_month' => 'required',
        "expiration_year",
        'cvc' => 'required',
    ]);

    $productId = $request->input('product_id');

    // Retrieve the product and check if the requested dates are available
    $product = Product::findOrFail($productId);
    $start = $request->input('start_date');
    $end = $request->input('end_date');

    $bookedDates = explode(',', $product->status);

    // Check if any of the requested dates overlap with the already booked dates
    $requestedDates = $this->getDatesRange($start, $end);
    $overlapDates = array_intersect($requestedDates, $bookedDates);

    if (!empty($overlapDates)) {
        return redirect()->back()->withErrors('The selected dates are already booked.')->with('alert', 'error');
    }

    // Update the status for the product
    $bookedDates = array_merge($bookedDates, $requestedDates);
    $product->status = implode(',', $bookedDates);
    $product->save();

    // Create the booking record
    $booking = new Booking();
    $booking->user_id = Auth::id();
    $booking->product_id = $productId;
    $booking->start_date = $start;
    $booking->end_date = $end;
    $booking->total_price = $request->input('total_price');
    $booking->booking_status = 'Pending'; // or any other default status
    $booking->save();

    return redirect()->back()->with('success', 'Booking created successfully.');
}

// Helper method to get the range of dates between two dates
private function getDatesRange($start, $end)
{
    $dates = [];
    $current = strtotime($start);
    $endDate = strtotime($end);

    while ($current <= $endDate) {
        $dates[] = date('Y-m-d', $current);
        $current = strtotime('+1 day', $current);
    }

    return $dates;
}


}
