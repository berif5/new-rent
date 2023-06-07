<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@extends('layout.master')

@include('sweetalert::alert')


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@section('content')

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/'.$product->image1) }}" class="d-block w-100" alt="..." style="width: 100%; height: 450px;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/'.$product->image2) }}" class="d-block w-100" alt="..." style="width: 100%; height: 450px;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/'.$product->image3) }}" class="d-block w-100" alt="..." style="width: 100%; height: 450px; ">
                    </div>
                </div>
                <button class="carousel-control-prev bg-white" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span  class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden ">Next</span>
                </button>
            </div>
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"> <b> {{ $product->product_name }} </b></h1>
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">${{ $product->product_price }}</h1>
            
            <p class="lead">{{ $product->product_description }}</p>
                {{-- @guest
                    <p>Please <a href="{{ route('login') }}">login</a> to book this product.</p>
                @else --}}
                    <form method="POST" action="{{ route('booking.store') }}" style="max-width: 400px; margin: 10px auto;">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <label for="start_date" style="display: block; margin-bottom: 10px; font-weight: bold;">Start Date:</label>
                        <input readonly type="date" name="start_date" id="start_date" onchange="calculateNumOfDays()" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" min="{{ $product->start_available_date }}" max="{{ $product->end_available_date }}" required>
                        @error('start_date')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror

                        <label for="end_date" style="display: block; margin-bottom: 10px; font-weight: bold;">End Date:</label>
                        <input readonly type="date" name="end_date" id="end_date" onchange="calculateNumOfDays()" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" min="{{ $product->start_available_date }}" max="{{ $product->end_available_date }}" required>
                        @error('end_date')
                        <small style="color: red;">{{ $message }}</small>
                        @enderror



                        <label for="num_of_days" style="display: block; margin-bottom: 10px; font-weight: bold;">Number of Days:</label>
                        <input type="number" name="num_of_days" id="num_of_days" readonly style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" required>

                        <input type="hidden" name="product_price" id="product_price" value="{{ $product->product_price }}" readonly style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" required>

                        <label for="total_price" style="display: block; margin-bottom: 10px; font-weight: bold;">Total Price:</label>
                        <input type="text" name="total_price" id="total_price" readonly style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" required>
                        <div >
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
                        </div>
                        <button  type="submit" id="submit-payment-btn" style="padding: 10px 20px; background-color: #007495; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Pay Now</button>
                    </form>
            @livewireScripts
            @if (session('success'))
        <script>
            window.onload = function() {
                alert("{{ session('success') }}");
            }
        </script>
    @endif
          </div>
        </div>
    </div>


    @livewire('product-ratings', ['product' => $product], key($product->id))

  {{--  --}}






  {{--  --}}




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

<script>
    // const bookedDates = [@json($product->booked_dates)];

    // $(function() {
    //     $("#date_range").datepicker({
    //         dateFormat: "yy-mm-dd",
    //         onSelect: function(startDate, endDate) {
    //             const selectedDates = getDatesRange(startDate, endDate);

    //             for (const date of selectedDates) {
    //                 if (bookedDates.includes(date)) {
    //                     alert('The selected dates are already booked.');
    //                     return;
    //                 }
    //             }

    //             // Store the selected start and end dates in hidden inputs for form submission
    //             $("#start_date").val(startDate);
    //             $("#end_date").val(endDate);
    //         }
    //     });
    // });

    // function getDatesRange(startDate, endDate) {
    //     const start = new Date(startDate);
    //     const end = new Date(endDate);
    //     const dates = [];
    //     let currentDate = start;

    //     while (currentDate <= end) {
    //         const formattedDate = currentDate.toISOString().split('T')[0];
    //         dates.push(formattedDate);
    //         currentDate.setDate(currentDate.getDate() + 1);
    //     }

    //     return dates;
    // }
</script>

<script language="javascript">
$(document).ready(function() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;

    $('#start_date').attr('min', today);
    $('#end_date').attr('min', today);



});

</script>

@if(Session::has('sweet_alert.alert'))
    <script>
        Swal.fire({
            {!! Session::pull('sweet_alert.alert') !!}
        });
    </script>
@endif

@if(Session::has('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif



@endsection
