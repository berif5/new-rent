<!DOCTYPE html>
<html>
    <head>
        <title>User Profile</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h1>User Profile</h1>
            @if ($user->getProfileImage())
                <img src="{{ $user->getProfileImage() }}" alt="Profile Image" style="width: 200px;">
            @else
                <p>No profile image found.</p>
            @endif
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
        </div>
    </body>
</html>
