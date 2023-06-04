@extends('layout.master')
@section('content')

<div class="container">
    <div class="contact_section_2" style="height: 800px">
        <div class="row">
            <div class="col-md-12">
                <div class="mail_section_1">
                    <form action="sign_lessor" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-light">Name:</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name">
                            <small class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-light">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
                            <small class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-light">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                            <small class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="text-light">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" placeholder="Confirm your password" name="confirm_password">
                            <small class="text-danger">
                                @error('confirm_password')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="text-light">Phone:</label>
                            <input type="number" class="form-control" id="phone_number" placeholder="Enter your phone" name="phone_number">
                            <small class="text-danger">
                                @error('phone_number')
                                    {{ $message}}
                                @enderror
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="address" class="text-light">Address:</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter your Address" name="address">
                            <small class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="form-group">
                            <label for="city" class="text-light">City:</label>
                            <input type="text" class="form-control" id="city" placeholder="Enter your City" name="city">
                            <small class="text-danger">
                                @error('city')
                                    {{ $message }}
                                @enderror
                            </small>
                        </div>
                        <div class="send_bt">
                            <button type="submit" class="btn btn-outline-light">Send</button>
                        </div>
                    </form>
                    <a href="sign" class="link-light">Do you want Sign as a User?</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
