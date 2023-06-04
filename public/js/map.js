function initMap() {
    // Set the coordinates for the map center
    var myLatLng = { lat: 31.9566, lng: 35.9450};

    // Create a map object and specify the DOM element for display
    var map = new google.maps.Map(document.getElementById("map"), {
        center: myLatLng,
        zoom: 12,
    });

    // Add a marker to the map
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: "My Location",
    });
}

// Initialize the map when the page finishes loading
window.onload = function () {
    initMap();
};
