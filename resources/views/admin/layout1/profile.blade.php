<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin/profile.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .newbutton{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class="image d-flex flex-column justify-content-center align-items-center">


                <div>
                    @foreach ($users as $user)
                    <img src="{{ $user->image }}" height="100" width="100" />

                     <div class="name mt-3">{{ $user->name }}</div>
                    </div>
                    <div>
                    <div class="name mt-3">{{ $user->email }}</div>
                    </div>
                {{-- <span class="idd">@eleanorpena</span> --}}


                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    {{-- <span class="idd1">Oxc4c16a645_b21a</span> --}}
                    <span><i class="fa fa-copy"></i></span>
                </div>
                <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                    {{-- <span class="number">1069 <span class="follow">Followers</span></span> --}}
                </div>
                <div class="d-flex mt-2 ">
                    <button class="btn1 btn-dark">Edit Profile</button>
                </div>
                <div>
                     <form action="{{ route('update-profile') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Profile Image</label>
                        <div class="custom-file">
                            <input type="file" id="image" name="image" class="custom-file-input">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>

                    <div class="form-group newbutton">
                        <button type="submit" class="btn1 btn-dark ">Save</button>
                    </div>
                </form>
                </div>

                <div class="text mt-3">
                    {{-- <span>Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br>
                        Artist/ Creative Director by Day #NFT minting@ with FND night. </span> --}}
                </div>
                <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                    <span><i class="fa fa-twitter"></i></span>
                    <span><i class="fa fa-facebook-f"></i></span>
                    <span><i class="fa fa-instagram"></i></span>
                    <span><i class="fa fa-linkedin"></i></span>
                </div>
            @endforeach
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
