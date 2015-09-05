<!DOCTYPE html>

<html>
    <head>

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="css/index.css" />

        <title>Select Destination</title>

    </head>

    <body>
        <header>
          <nav>
            <div class="bars"></div>
            <div class="bars"></div>
            <div class="bars"></div>
          </nav>
          <img class="logo" src="img/b2r.png" />
        </header>

        <input id="pac-input" class="controls" type="text" placeholder="Your Destination">
        
        <div id="map"></div>

        <div class="station-cont">
            <div><img class="icons" src="img/station.png"/>3 Stations near you. Select One.</div>
            <div><a href="formgroup.php">Ayala MRT (closest)</a></div>
            <div><a href="destination.php">Vito Cruz</a></div>
            <div><a href="formgroup.php">Ayala Triangle</a></div>
        </div>

        <!-- <a id="join-button" class="gb-menu-items" href="destination.php" style="position: fixed; z-index: 2; bottom: 0; display: block;"><i class="fa fa-plus"></i>SELECT DESTINATION</a>  -->
    
<script>
            
            function initAutocomplete() {
              
              var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -33.8688, lng: 151.2195},
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              });
              var infoWindow = new google.maps.InfoWindow({map: map});

              // Create the search box and link it to the UI element.
              var input = document.getElementById('pac-input');
              var searchBox = new google.maps.places.SearchBox(input);
              map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

              // Bias the SearchBox results towards current map's viewport.
              map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
              });

              var markers = [];
              
              searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                  return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                  marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                  var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                  };

                  // Create a marker for each place.
                  markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                  }));

                  if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                  } else {
                    bounds.extend(place.geometry.location);
                  }
                });
                map.fitBounds(bounds);
              });
              // [END region_getplaces]

              // Try HTML5 geolocation.
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                  var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                  };

                  infoWindow.setPosition(pos);
                  infoWindow.setContent('Location found.');
                  map.setCenter(pos);
                }, function() {
                  handleLocationError(true, infoWindow, map.getCenter());
                });
              } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
              }
            }
            

            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
              infoWindow.setPosition(pos);
              infoWindow.setContent(browserHasGeolocation ?
                                    'Error: The Geolocation service failed.' :
                                    'Error: Your browser doesn\'t support geolocation.');
            }

        </script>

        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
             async defer></script>
    </body>
</html>