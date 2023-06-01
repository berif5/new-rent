@extends('admin.layout1.master')

@section('content')
    <div class="container">
        <h1>Edit Lessor</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('lessordashboard.update', $lessor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $lessor->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $lessor->email }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>


            <div class="mb-3">
                <label for="phone_number" class="form-label">phone_number</label>
                <input type="phone_number" class="form-control" id="phone_number" name="phone_number" required>
            </div>


            <div class="mb-3">
                <label for="address" class="form-label">address</label>
                <input type="address" class="form-control" id="address" name="address" required>
            </div>


            <div class="mb-3">
                <label for="city" class="form-label">city</label>
                <input type="city" class="form-control" id="city" name="city" required>
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
