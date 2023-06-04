@extends('layout.master')

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@section('content')

<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset($product->image1) }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset($product->image2) }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset($product->image3) }}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">{{ $product->product_name }}</h1>
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">${{ $product->product_price }}</h1>
        <p class="lead">{{ $product->product_description }}</p>

        <p style="font-weight: bold; color: {{ $product->status == 0 ? 'green' : 'red' }}; ">
          @if ($product->status == 0)
            Available
          @else
            Unavailable
          @endif
        </p>

        @if ($product->status == 0)

        <form method="POST" action="{{ route('booking.store') }}" style="max-width: 400px; margin: 10px auto;">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <label for="start_date" style="display: block; margin-bottom: 10px; font-weight: bold;">Start Date:</label>
            <input type="date" name="start_date" id="start_date" onchange="calculateNumOfDays()" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" >

            <label for="end_date" style="display: block; margin-bottom: 10px; font-weight: bold;">End Date:</label>
            <input type="date" name="end_date" id="end_date" onchange="calculateNumOfDays()" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" >

            <label for="num_of_days" style="display: block; margin-bottom: 10px; font-weight: bold;">Number of Days:</label>
            <input type="number" name="num_of_days" id="num_of_days" readonly style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" required>

            <label for="product_price" style="display: block; margin-bottom: 10px; font-weight: bold;">Product Price:</label>
            <input type="text" name="product_price" id="product_price" value="{{ $product->product_price }}" readonly style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" required>

            <label for="total_price" style="display: block; margin-bottom: 10px; font-weight: bold;">Total Price:</label>
            <input type="text" name="total_price" id="total_price" readonly style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" required>

            <button type="submit" style="padding: 10px 20px; background-color: #007495; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Book Now</button>
        </form>
        @endif
       
        @livewireScripts

        {{-- لما يزبط السيشن يفترض هاي تشتغل --}}
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
    // function calculateNumOfDays() {
    //     var startDate = new Date(document.getElementById('start_date').value);
    //     var endDate = new Date(document.getElementById('end_date').value);

    //     // Calculate the difference in days
    //     var timeDifference = endDate.getTime() - startDate.getTime();
    //     var numOfDays = Math.ceil(timeDifference / (1000 * 3600 * 24));

    //     // Update the input field with the calculated value
    //     document.getElementById('num_of_days').value = numOfDays;
    // }

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

</html>
@endsection

