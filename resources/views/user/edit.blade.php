<!DOCTYPE html>
<html>
<head>
    <title>Edit User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit User Profile</h1>
        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>

            <!-- Add more fields to edit as needed -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
