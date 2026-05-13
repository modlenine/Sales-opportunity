<!DOCTYPE html>
<html>

<head>
    <title>Marker Animations</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3A9Mc08SyCJjtWFLFijSITvvx0UmdmFU&callback=initMap&libraries=&v=weekly" defer></script>
    <!-- jsFiddle will insert css and js -->


    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 500px;
        }

        /* Optional: Makes the sample page fill the window. */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

    <script>
        // The following example creates a marker in Stockholm, Sweden using a DROP
        // animation. Clicking on the marker will toggle the animation between a BOUNCE
        // animation and no animation.
        let marker;
        let lat = 59.29046329600998;
        let lng = 18.139441101074233;
        let locationname = 'test';

        function initMap() {
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13,
                center: {
                    lat: lat,
                    lng: lng
                },
            });

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======


>>>>>>> update google map
>>>>>>> update google map
            const contentString = locationname;

            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });

            marker = new google.maps.Marker({
                map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {
                    lat: lat,
                    lng: lng
                },
            });

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

            navigator.geolocation.getCurrentPosition(function(position) {
                // Center on user's current location if geolocation prompt allowed
                var initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.setCenter(initialLocation);
                map.setZoom(13);
                infoWindow.setContent("Location found.");
            }, function(positionError) {
                // User denied geolocation prompt - default to Chicago
                map.setCenter(new google.maps.LatLng(39.8097343, -98.5556199));
                map.setZoom(5);
            });





>>>>>>> update google map
>>>>>>> update google map
            marker.addListener("mouseup", saylocation);

            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======


>>>>>>> update google map
>>>>>>> update google map
        }

        function saylocation() {
            document.getElementById("inputLocationLat").value = marker.getPosition().lat();
            document.getElementById("inputLocationLng").value = marker.getPosition().lng();
            document.getElementById("inputLocationLatLng").value = marker.getPosition();
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
    </script>
</head>

<body>
    <div id="map"></div>

    <input type="text" name="inputLocationLat" id="inputLocationLat" style="width:500px;"><br>
    <input type="text" name="inputLocationLng" id="inputLocationLng" style="width:500px;"><br>
    <input type="text" name="inputLocationLatLng" id="inputLocationLatLng" style="width:500px;">
</body>

</html>