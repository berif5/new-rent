@extends('admin.layout1.master')

@section('content')
    <div class="container">
        <h1>User Details</h1>

        <div class="card">
            <div class="card-header">
                User Information
            </div>
            <div class="card-body">
                <h5 class="card-title"> Name: {{ $user->name }}</h5>


                <p class="card-text">Email: {{ $user->email }}</p>

                <p class="card-text">Password: {{ $user->password }}</p>

                <p class="card-text">image:
                    @if ($user->image)
                        <img src="{{ $user->image }}" alt="image" width="50" height="50">
                    @else
                        N/A
                    @endif
                </div>
                     </div>

        <a href="{{ route('userdashboard.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
