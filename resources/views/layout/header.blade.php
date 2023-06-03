<!DOCTYPE html>
<html>
   <head>

      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rating system</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClyMXnFf1rC2yAaV2Dj5qQIpzZ2EvOf3I" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
      <!-- site metas -->
      <title>Rent-a-Ride</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}"> --}}

          <!-- Custom fonts for this template-->
    <link href="{{asset('public')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('public')}}/css/sb-admin-2.min.css" rel="stylesheet">
   
                
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/logo.png') }}"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                     </li>
                     {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('vehicles') }}">Vehicles</a>
                     </li> --}}
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('vehicle') }}">Vehicles</a>
                        {{-- <a class="nav-link" href="{{ route('gallery') }}">Gallery</a> --}}
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('client') }}">Client</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('lessor.index') }}">Lessor</a>
                     </li>
                     
                        @guest
                     <li class="nav-item">
                         <a class="nav-link" href="{{ route('login') }}">Login</a>
                     </li>
                        @endguest

                     {{-- <li class="nav-item">
                        <form action="logout" method="POST">
                           @csrf
                           <button class="nav-link" > Logout </button>
                        </form>
                     </li> --}}

                     @if (Auth::check())
                       <li class="nav-item">
                       <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                         </li>
                         @endif
                     <li class="nav-item">
                        <a class="nav-link" href="sign">Sign up</a>
                     </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                  </form>
               </div>
            </nav>
         </div>
      </div>
      <!-- header section end -->
     

      <div class="call_text_main">
         <div class="container">
            <div class="call_taital">
               <div class="call_text"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left_15">Location</span></a></div>
               <div class="call_text"><a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left_15">(+71) 8522369417</span></a></div>
               <div class="call_text"><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left_15">demo@gmail.com</span></a></div>
            </div>
         </div>
      </div>
