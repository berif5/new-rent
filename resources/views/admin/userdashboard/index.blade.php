@extends('admin.layout1.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>password</th> --}}
                        <th>image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- <td>{{ $user->password }}</td> --}}
                            <td><img src="{{ $user->image }}" alt="" style="width: 100px"></td>

                            {{-- <td><img src="{{ $user->image }}" alt="user img" width="50px" height="50px"></td> --}}
                            <td>
                                <a href="{{ route('userdashboard.show', $user->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('userdashboard.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('userdashboard.destroy', $user->id) }}" method="POST" style="display: inline">
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
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection
