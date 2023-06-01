@extends('admin.layout1.master')

@section('content')
    <div class="container">
        <h1>products Details</h1>

        <div class="card">
            <div class="card-header">
               products Information
            </div>
            <div class="card-body">
                <h5 class="card-title">product_name: {{ $product->product_name}}</h5>


                <p class="card-text">product_description: {{ $product->product_description }}</p>

                <p class="card-text">product_price: {{ $product->product_price }}</p>
                <p class="card-text">status: {{ $product->status }}</p>
                <p class="card-text">product_type : {{ $product->product_type  }}</p>
                <p class="card-text">category_id: {{ $product->category_id }}</p>
                <p class="card-text">image1:
                    @if ($product->image1)
                        <img src="{{ $product->image1 }}" alt="image" width="50" height="50">
                    @else
                        N/A
                    @endif
                    <p class="card-text">image2:
                        @if ($product->image2)
                            <img src="{{ $product->image }}" alt="image" width="50" height="50">
                        @else
                            N/A
                        @endif
                        <p class="card-text">image3:
                            @if ($product->image3)
                                <img src="{{ $product->image }}" alt="image" width="50" height="50">
                            @else
                                N/A
                            @endif
                </div>
                     </div>

        <a href="{{ route('productdashboard.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
