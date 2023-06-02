<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingdashboardController extends Controller
{
    // public function index()
    // {
    //     $bookings = Booking::all();
    //      $user = User::all();
    //     return view('admin.bookingdashboard.index', compact('bookings','user'));
    // }
    public function index()
    {
        // Retrieve all reservations
        $bookings = Booking::all();

        // Pass the reservations to the view
        return view('admin.bookingdashboard.index', compact('bookings'));
    }
    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return view('booking.show', compact('booking'));
    }

}
