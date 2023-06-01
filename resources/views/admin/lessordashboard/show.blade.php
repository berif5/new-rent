@extends('admin.layout1.master')

@section('content')
    <div class="container">
        <h1>lessor Details</h1>

        <div class="card">
            <div class="card-header">
                lessor Information
            </div>
            <div class="card-body">
                <h5 class="card-title"> Name: {{ $lessor->name }}</h5>


                <p class="card-text">Email: {{ $lessor->email }}</p>

                <p class="card-text">Password: {{ $lessor->password }}</p>
                <p class="card-text">phone_number: {{ $lessor->phone_number }}</p>
                <p class="card-text">address: {{ $lessor->address }}</p>
                <p class="card-text">city: {{ $lessor->city }}</p>
                <p class="card-text">image:
                    @if ($lessor->image)
                        <img src="{{ $lessor->image }}" alt="image" width="50" height="50">
                    @else
                        N/A
                    @endif
                </div>
                     </div>

        <a href="{{ route('lessordashboard.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
