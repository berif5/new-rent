@extends('Admin.layout1.master')

@section('content')
    <div class="container">
        <h1>booking Details</h1>

        <div class="card">
            <div class="card-header">
                booking Information
            </div>
            <div class="card-body">
                <h5 class="card-title">First Name: {{ $appointment->user_id }}</h5>
                <p class="card-title">Last Name: {{ $appointment->farm_id }}</p>

                <p class="card-text">Email: {{ $appointment->check_in }}</p>
                <p class="card-text">phone: {{ $appointment->check_out}}</p>
                {{-- <p class="card-text">Password: {{ $appointment->password }}</p> --}}
                {{-- <p class="card-text">Role: {{ $appointment->role->name }}</p> --}}
                {{-- <p class="card-text">Profile Picture: --}}

            </div>
        </div>

        <a href="{{ route('appointmentdashboard.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
