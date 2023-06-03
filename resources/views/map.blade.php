@extends('layout.app')

@section('content1')
    <div id="map" style="height: 700px;"></div>

    <script>
        function initMap() {
            // Set the coordinates for the map center
            var myLatLng = {lat: 32.032135, lng: 35.739118};

            // Create a map object and specify the DOM element for display
            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 12
            });

            // Add a marker to the map
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'My Location'
            });
        }
    </script>

    <script>
        // Initialize the map when the page finishes loading
        window.onload = function() {
            initMap();
        }
    </script>
@endsection