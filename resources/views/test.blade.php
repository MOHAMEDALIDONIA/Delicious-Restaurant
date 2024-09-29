<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order Form</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Order Food</h1>

    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" readonly>
        </div>

        <!-- Leaflet Map -->
        <div id="map"></div>

        <button type="submit" class="btn btn-primary mt-3">Submit Order</button>
    </form>
</div>

<script>
    var map = L.map('map').setView([30.033333, 31.233334], 14); // Set initial location and zoom

    // Load tiles from OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
    }).addTo(map);

    var marker;

    // Reverse Geocoding Function
    function reverseGeocode(lat, lng) {
        fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('address').value = data.display_name;
            })
            .catch(error => console.error('Error:', error));
    }

    // Add click event listener to map
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        // Add or move marker to clicked location
        if (marker) {
            marker.setLatLng([lat, lng]);
        } else {
            marker = L.marker([lat, lng]).addTo(map);
        }

        // Call the reverse geocoding function
        reverseGeocode(lat, lng);
    });
</script>

</body>
</html>

