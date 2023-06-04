@extends('layout.master')
@section('content')

<form method="POST" action="{{ route('payment.process') }}" style="max-width: 400px; margin: 10px auto;">
    @csrf
    <input type="hidden" name="booking_id" value="{{ $booking->id }}">

    <label for="name_on_card" style="display: block; margin-bottom: 10px; font-weight: bold;">Name on Card:</label>
    <input type="text" name="name_on_card" id="name_on_card" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" >

    <label for="card_number" style="display: block; margin-bottom: 10px; font-weight: bold;">Card Number:</label>
    <input type="text" name="card_number" id="card_number" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" >

    <label for="cvc" style="display: block; margin-bottom: 10px; font-weight: bold;">CVC:</label>
    <input type="text" name="cvc" id="cvc" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" >

    <label for="expiration_month" style="display: block; margin-bottom: 10px; font-weight: bold;">Expiration Month:</label>
    <input type="text" name="expiration_month" id="expiration_month" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" >

    <label for="expiration_year" style="display: block; margin-bottom: 10px; font-weight: bold;">Expiration Year:</label>
    <input type="text" name="expiration_year" id="expiration_year" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc; width: 100%;" >

    <button type="submit" style="padding: 10px 20px; background-color: #007495; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">Pay Now</button>
</form>


@endsection
