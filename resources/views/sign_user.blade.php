@extends('layout.master')
@section('content')
<br> <br>
<style>
    #mylink{
        /* text-align: center; */
        color: white;
    }
    .mydiv{
        display: flex; flex-direction: column;  align-items: center; gap: 10px;
    }
</style>
<div class="container">

    <div class="contact_section_2">
        <div class="row">
            <div class="col-md-12">
                <div class="mail_section_1">
                    <form action="sign" method="POST">
                        <h2 style="text-align: center; color:white;">User Sign up</h2>

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
                        <div class="mydiv">
                            <button type="submit" class="btn btn-outline-light">Send</button>
                            <a href="sign_lessor" id="mylink" >
                                Do you want to sign up as a Lessor?
                            </a>
                        </div>

                    </form>
                    {{-- <a href="sign_lessor" class="link-light">Do you want Sign as a Lessor?</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
