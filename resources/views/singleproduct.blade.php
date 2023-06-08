<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@extends('layout.master')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@section('content')

<style>
        .carousel-control-prev,
    .carousel-control-next {
        color: #273F54;
        background-color: transparent;
        border-color: #273F54;
    }

.page {
  /* Styles for the page container */
}

.baobab {
  position: relative;
}

.blur-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
  backdrop-filter: blur(8px); /* Adjust the blur radius as needed */
  z-index: 9998;
  display: flex;
  align-items: center;
  justify-content: center;
  pointer-events: none;
}


    /* Delete button */
    .delete-button {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #273f54;
      color: #fff;
      border: none;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      line-height: 30px;
      text-align: center;
      cursor: pointer;
      font-size: 16px;
    }

    .product-table {
    width: 100%;
    padding: 5px;
}

.product-table th, .product-table td {
    padding: 5px;
}

  </style>

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <div id="carouselExampleControlsNoTouching" class="carousel carousel-dark slide " data-bs-touch="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/'.$product->image1) }}" class="d-block w-100 border border-gray-300" alt="..." style="width: 100%; height: 450px;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/'.$product->image2) }}" class="d-block w-100 border border-gray-300" alt="..." style="width: 100%; height: 450px;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/'.$product->image3) }}" class="d-block w-100 border border-gray-300" alt="..." style="width: 100%; height: 450px;">
                    </div>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span style="background-color: #273F54" class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span style="background-color: #273F54" class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span  class="sr-only">Next</span>
                </button>

            </div>



            <div class="m-3">
                <h2><b> Product Details </b></h2>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Property:</th>
            <td>Value</td>
        </tr>
        <tr>
            <th>Product Type:</th>
            <td>{{$product->product_type}}</td>
        </tr>
        <tr>
            <th>Product Name:</th>
            <td>{{$product->product_name}}</td>
        </tr>
        <tr>
            <th>Manufacturing Year:</th>
            <td>{{$product->manufacturing_year}}</td>
        </tr>
        <tr>
            <th>Gear Type:</th>
            <td>{{$product->gear_type}}</td>
        </tr>
        <tr>
            <th>Fuel Type:</th>
            <td>{{$product->fuel_type}}</td>
        </tr>
        <tr>
            <th>Number of Seats:</th>
            <td>{{$product->num_seats}}</td>
        </tr>
    </table>
</div>


                <br>
                <p class="lead">{{$product->product_description }}</p>
            </div>


        </div>

        <div class="col-lg-6" style="margin-bottom: 350px">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"> <b> {{ $product->product_name }} </b></h1>
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">${{ $product->product_price }}</h1>
                {{-- @guest
                    <p>Please <a href="{{ route('login') }}">login</a> to book this product.</p>
                @else --}}
                    <form method="POST" action="{{ route('booking.store') }}" style="max-width: 400px; ">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <label for="start_date" style="display: block; margin-bottom: 10px; font-weight: bold;">Start Date:</label>
                        <input type="date" name="start_date" id="start_date" onchange="calculateNumOfDays()" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;">
                        @error('start_date')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror

                        <label for="end_date" style="display: block; margin-bottom: 10px; font-weight: bold;">End Date:</label>
                        <input type="date" name="end_date" id="end_date" onchange="calculateNumOfDays()" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;">
                        @error('end_date')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror

                        <label for="num_of_days" style="display: block; margin-bottom: 10px; font-weight: bold;">Number of Days:</label>
                        <input type="number" name="num_of_days" id="num_of_days" readonly style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" required>

                        <input type="hidden" name="product_price" id="product_price" value="{{ $product->product_price }}" readonly style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" required>

                        <label for="total_price" style="display: block; margin-bottom: 10px; font-weight: bold;">Total Price:</label>
                        <input type="text" name="total_price" id="total_price" readonly style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" required>

                        <div style="margin-top: 20px">
                            <a id="open-popup-btn"  style="padding: 10px 20px; background-color: #007495; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; ">Book Now</a>
                        </div>
                        <div class="page">
                            <div class="baobab">
                        <div id="payment-popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 4px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); z-index: 9999; max-width: 400px;">
                            <div>
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; font-weight: bold; font-size: 13px; margin-bottom: 5px;" for="name">Name:</label>
                                    <input style=" width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; " type="text" id="name" name="name_on_card" placeholder="Enter your name">
                                    @error('name_on_card')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; font-weight: bold;  font-size: 13px; margin-bottom: 5px;" for="card">Card Number:</label>
                                    <input style="width: 100%;  padding: 8px; border: 1px solid #ccc; border-radius: 4px; " type="text" id="card" name="card_number" placeholder="Enter your card number">
                                    @error('card_number')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; font-weight: bold; font-size: 13px; margin-bottom: 5px;" for="expiry">Expiry Date:</label>
                                    <input style="width: 100%;  padding: 8px; border: 1px solid #ccc; border-radius: 5px; " type="text" id="expiry" name="expiration_month" placeholder="MM/YY">
                                    @error('expiration_month')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div style="margin-bottom: 20px;">
                                    <label style="display: block; font-weight: bold; font-size: 13px; margin-bottom: 5px;" for="cvv">CVV:</label>
                                    <input style="width: 100%;  padding: 8px; border: 1px solid #ccc; border-radius: 5px; " type="text" id="cvv" name="cvc" placeholder="Enter CVV">
                                    @error('cvc')
                                    <small style="color: red;">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button id="delete-popup-btn" class="delete-button">×</button>
                            </div>
                            <button  type="submit" id="submit-payment-btn" style="padding: 10px 20px; background-color: #007495; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Pay Now</button>
                        </div>
                    </div>
                </div>
                    </form>


            @livewireScripts


    {{-- @if(session('alert'))
    <script>
        alert('{{ session('alert') }}');
    </script>
    @endif --}}

    @if (Session::has('alert'))
    <div class="alert alert-{{ Session::get('alert') }}">
        {{ Session::get('message') }}
    </div>
@endif



    @if(session('alert') && session('alert') === 'success')
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Booked Successfully',
            text: '{{ session('success') }}',

        });
    </script>
@endif

@if(session('alert') && session('alert') === 'error')
    <script>
        Swal.fire({
            icon: 'error',
            title: 'The selected dates are already booked',
            text: '{{ session('errors')->first() }}',
        });
    </script>
@endif



          </div>
        </div>
    </div>


    @livewire('product-ratings', ['product' => $product], key($product->id))


{{-- for booking --}}
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(".date-input", {
            inline: true
        });
    });
</script>

<script>
    function calculateNumOfDays() {
        var startDate = new Date(document.getElementById('start_date').value);
        var endDate = new Date(document.getElementById('end_date').value);

        // Calculate the difference in days
        var timeDifference = endDate.getTime() - startDate.getTime();
        var numOfDays = Math.ceil(timeDifference / (1000 * 3600 * 24));

        // Update the input field with the calculated value
        document.getElementById('num_of_days').value = numOfDays;

        // Calculate and update the total_price
        var productPrice = parseFloat(document.getElementById('product_price').value);
        var totalPrice = numOfDays * productPrice;
        document.getElementById('total_price').value = totalPrice.toFixed(2);
    }
</script>

{{-- for not book a pre-booked --}}

<script language="javascript">
$(document).ready(function() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    $('#start_date').attr('min', today);
    $('#end_date').attr('min', today);


    // Disable previously selected dates

    $('#start_date, #end_date').datepicker({
        beforeShowDay: function(date) {
            var dateString = $.datepicker.formatDate('yy-mm-dd', date);
            return [!bookedDates.includes(dateString)]; // Disable booked dates
        }
    });
});

</script>

<script>
    // Get the popup container, the button/link that opens it, and the delete button
    const popup = document.getElementById('payment-popup');
    const openBtn = document.getElementById('open-popup-btn');
    const deleteBtn = document.getElementById('delete-popup-btn');

    // Function to open the popup
    function openPopup() {
      popup.style.display = 'block';
      document.body.classList.add('blurry-background');
    }

    // Function to close the popup
    function closePopup() {
      popup.style.display = 'none';
      document.body.classList.remove('blurry-background');
    }

    // Function to handle the delete button click
    function deletePopup() {
      closePopup();
      // Additional code to handle deletion
    }

    // Attach event listeners to the buttons/links
    openBtn.addEventListener('click', openPopup);
    deleteBtn.addEventListener('click', deletePopup);

    // You can also close the popup by clicking outside of it
    window.addEventListener('click', (event) => {
      if (event.target === popup) {
        closePopup();
      }
    });
  </script>



@endsection
