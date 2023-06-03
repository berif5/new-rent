<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;



class PaymentController extends Controller
{
    public function showPayment($booking_id)
    {
        $booking = Booking::find($booking_id);

        return view('payment', ['booking' => $booking]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'booking_id' => 'required|exists:bookings,id',
            'name_on_card' => 'required',
            'card_number' => 'required|digits_between:12,19',
            'cvc' => 'required',
            'expiration_month' => 'required',
            'expiration_year' => 'required',
        ]);

        // Process the payment and handle other payment-related logic
        // ...

        $bookingId = $validatedData['booking_id'];
        $booking = Booking::find($bookingId);

        // Set a success message in the session
        // $request->session()->flash('success', 'Payment successful!');

        return redirect()->route('singleproduct', ['product_id' => $booking->product_id]);
    }

}
