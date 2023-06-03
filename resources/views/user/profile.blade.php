@extends('layout.master')
@section('content')
<style>
   .profile-heading img{ width: 150px; height: 150px;}
   .profile-heading{margin-top: 15px;}
</style>
    <div class="container">
        <div class="profile">
            <br> <br>
            <div class="profile-heading">
                <img src="{{ $user->image }}" class="profile-img" alt="User Image">
                <h1>{{ $user->name }}</h1>
                <p class="text-muted">{{ $user->email }}</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h2 class="info-label">Customer Information</h2>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Address:</strong> {{ $user->address }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone }}</li>
                        <li class="list-group-item"><strong>Membership:</strong> {{ $user->membership }}</li>
                        <!-- Add more customer information here as needed -->
                    </ul>
                </div>
                <div class="col-md-6">
                    <h2 class="info-label">Booking History</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit Profile</a>

                        {{-- <tbody>
                            <!-- Loop through the user's bookings and display them in the table -->
                            @foreach ($user->bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->car }}</td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->status }}</td>
                                </tr>
                            @endforeach
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br> <br>
@endsection
