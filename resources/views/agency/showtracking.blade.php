<!DOCTYPE html>
<html>
<head>
    <title>Driver Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard  /{{ (session()->get('DriverId'))  }} </h1>
    <div id="map"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var map;
        var marker;
       
        function initMap() {
            // Initialize the map
            map = new google.maps.Map(document.getElementById('map'), {
                center:  {lat: {{$latitude}}, lng: {{$longitude}} },
                zoom: 8
            });
            marker = new google.maps.Marker({
                position: {lat: {{$latitude}}, lng: {{$longitude}} },
                map: map,
                // animation: google.maps.Animation.BOUNCE
                
            });  
        }

        setInterval(function() {
           
            navigator.geolocation.getCurrentPosition(function(position) {
                $.ajax({
                    url: '/driver/update-location',
                    method: 'POST',
                    data: {
                        latitude: position.coords.latitude,
                       longitude: position.coords.longitude,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
        try {
            console.log(response);
            
            
            var receivedLongitude = response.longitude;
            var receivedLatitude = response.latitude;

            if (receivedLatitude && receivedLongitude) {
                var newLatLng = new google.maps.LatLng(receivedLatitude, receivedLongitude);
                map.setCenter(newLatLng); // Set the map center to the new location
            marker.setPosition(newLatLng);
                // map.setZoom(8);
            } else {
                console.error("Missing latitude or longitude in response");
            }
        } catch (e) {
            console.error("Error parsing JSON response:", e);
        }
    },
    error: function(xhr, status, error) {
        console.error("AJAX error:", error);
        console.log("Response:", xhr.responseText);
    }
                });
            });
        }, 10000); // Update location every 10 seconds
      
        // Initialize the map on page load
        initMap();
    </script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpjRNxOP_AcmClLVwi2aAbi6xfAF789mo&callback=initMap" async defer></script>   
</body>
</html>





