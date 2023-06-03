@extends('admin.layout1.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
           Lessors
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>password</th> --}}
                        <th>phone_number</th>
                        <th>address</th>
                        <th>city</th>
                        <th>image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lessors as $lessor)
                        <tr>
                            <td>{{ $lessor->name }}</td>
                            <td>{{ $lessor->email }}</td>
                            {{-- <td>{{ $user->password }}</td> --}}
                            <td>{{ $lessor->phone_number }}</td>
                            <td>{{ $lessor->address }}</td>
                            <td>{{ $lessor->city }}</td>
                            <td><img src="{{ $lessor->image }}" alt="user img" width="50px" height="50px"></td>

                            <td>
                                <a href="{{ route('lessordashboard.show', $lessor->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('lessordashboard.edit', $lessor->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('lessordashboard.destroy', $lessor->id) }}" method="POST" style="display: inline">
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
                {{ $lessors->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection
