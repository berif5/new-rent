@extends('layout.app')

@section('content1')

<div class="product-tab-list tab-pane fade show active" id="description">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="review-content-section">
                    <div class="card-wrapper"></div>
                    <form class="payment-form mt-4">
                        <div class="form-group">
                            <input name="number" type="tel" class="form-control" placeholder="Card Number">
                        </div>
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input name="expiry" type="tel" class="form-control" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <input name="cvc" type="number" class="form-control" placeholder="CVC">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection