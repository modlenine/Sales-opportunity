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

            marker.addListener("mouseup", saylocation);

            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });

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