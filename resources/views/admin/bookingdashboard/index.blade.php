@extends('admin.layout1.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
           bookings
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>user_id </th>
                        <th>product_id </th>
                        {{-- <th>password</th> --}}
                        <th>start_date</th>
                        <th>end_date</th>
                        <th>total_price</th>
                        <th>booking_status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{$booking->user_id  }}</td>
                            <td>{{ $booking->product_id }}</td>
                            {{-- <td>{{ $user->password }}</td> --}}
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date}}</td>
                            <td>{{ $booking->total_price }}</td>
                            <td>{{ $booking->booking_status }}</td>

                            <td>
                                <a href="{{ route('bookingdashboard.show', $booking->id) }}" class="btn btn-primary">View</a>
                                {{-- <a href="{{ route('userdashboard.edit', $user->id) }}" class="btn btn-success">Edit</a> --}}
                                {{-- <form action="{{ route('bookingdashboard.destroy', $user->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $bookings->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection
