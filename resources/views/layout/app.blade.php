<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Your head content -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClyMXnFf1rC2yAaV2Dj5qQIpzZ2EvOf3I" defer></script>
</head>
<body>

    @yield('content1')


    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('js/card.js') }}"></script>
    <script src="{{ asset('js/jquery.payform.min.js') }}"></script>
    <script src="{{ asset('js/e-payment.js') }}"></script>
</body>
</html>