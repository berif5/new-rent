@extends('layout.master')
@section('content')
<style>
   .profile-heading img{ width: 100px; height: 100px;}
   .profile-heading{margin-top: 20px;}

        /* Styles for the popup form */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            text-align: right;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .mybutton{background-color: #434960;
        color: #fcf8f1;}

        .pro{display: flex;align-items: center;}
        /* .pro div p{padding: 0 0 10px 0;} */
        #myname{text-align: left;
            margin-left: 5px;}
    </style>
 <script>
    // JavaScript to handle the popup form
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('editProfileModal');
        var btn = document.getElementById('openEditProfileModal');
        var span = document.getElementsByClassName('close')[0];

        btn.onclick = function() {
            modal.style.display = 'block';
        }

        span.onclick = function() {
            modal.style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }
    });
</script>
    <div class="container">
        <div class="profile">
            <br> <br>
            <div class="profile-heading pro">
                <img src="{{ $user->image }}" class="profile-img" alt="User Image">
                <div id="myname">
                <h1>{{ $user->name }}</h1>
                <p class="text-muted">{{ $user->email }}</p>
            </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h2 class="info-label">Customer Information</h2>

                    <ul class="list-group">
                        <li class="list-group-item"><strong>Address:</strong> {{ $user->address }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $user->phone }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Image:</strong> {{ $user->image }}</li>
                        {{-- <li class="list-group-item"><strong>Password:</strong> {{ $user->password }}</li> --}}


                        {{-- <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit Profile</a> --}}
                        <button id="openEditProfileModal" class="btn mybutton">Edit Profile</button>


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
                                <th>Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Loop through the user's bookings and display them in the table -->
                            @foreach ($user->bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->product->product_name }}</td>

                                    <td>{{ $booking->start_date }}</td>
                                    <td>{{ $booking->total_price }} JD</td>
                                    <td>{{ $booking->booking_status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="editProfileModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h2>Edit Profile</h2>
                    <form id="editProfileForm" method="POST" action="{{ route('user.update', $user->id) }}" class="edit-profile-form">
                        @csrf
                        @method('PUT')
                        <!-- Add form fields for editing profile information -->
                        <div>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                        <div>
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" value="{{ $user->address }}" class="form-control">
                        </div>
                        <div>
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>

                        <div>
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control">
                        </div>
                        <div>
                            <label for="image">Image:</label>
                            <input type="text" id="image" name="image" value="{{ $user->image }}" class="form-control">
                        </div> <br>
                        <button type="submit" class="btn mybutton">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <br> <br>
    <div style="height: 100px">

    </div>
@endsection
