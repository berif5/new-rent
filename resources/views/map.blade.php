@extends('layout.app')

@section('content1')
    <div id="map" style="height: 700px;"></div>

    <script>
        function initMap() {                   //This function is responsible for initializing the map and adding a marker to it.
            // Set the coordinates for the map center
            var myLatLng = {lat: 32.032135, lng: 35.739118}; //sets the latitude and longitude coordinates for the map center

            // Create a map object and specify the DOM element for display
            var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 12 //This line creates a new google.maps.Map object and associates it with the HTML element with the ID 'map'. It sets the center of the map to the specified
                myLatLng coordinates and sets the initial zoom level to 12.
            });

            // Add a marker to the map
            var marker = new google.maps.Marker({
                position: myLatLng,//This line creates a new google.maps.Marker object and associates it with the map.
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
