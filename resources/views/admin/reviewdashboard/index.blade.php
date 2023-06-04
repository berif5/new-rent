@extends('Admin.layout1.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
             Feedbaks
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>user_id </th>
                        <th> product_id</th>
                        <th>review_text</th>
                        <th>rating</th>

                        {{-- <th>Password</th> --}}

                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                        <tr>
                            <td>{{ $review->user_id }}</td>
                            <td>{{ $review->product_id }}</td>
                            <td>{{ $review->comment }}</td>
                            <td>⭐{{ $review->rating }}</td>
                            {{-- <td>{{ $user->password }}</td> --}}
                            <td>
                                <a href="{{ route('reviewdashboard.show', $review->id) }}" class="btn btn-primary">View</a>
                                {{-- <a href="{{ route('userdashboard.edit', $user->id) }}" class="btn btn-success">Edit</a> --}}
                                <form action="{{ route('reviewdashboard.destroy', $review->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $reviews->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection
