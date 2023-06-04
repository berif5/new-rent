@extends('Admin.layout1.master')

@section('content')
    <div class="container">
        <h1>booking Details</h1>

        <div class="card">
            <div class="card-header">
                booking Information
            </div>
            <div class="card-body">
                <h5 class="card-title"> Name: {{ $booking->user_id }}</h5>
                <p class="card-title">product-id: {{ $booking->product_id }}</p>

                <p class="card-text">Total price: {{ $booking->total_price }}</p>
                <p class="card-text">Booking status: {{ $booking->booking_status}}</p>


            </div>
        </div>

        <a href="{{ route('bookingdashboard.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
