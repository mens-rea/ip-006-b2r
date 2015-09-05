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

        <div id="map"></div>

        <div class="group-cont lone-cont">
            <div class="user-dets-cont">
                <h3 class="user-stat"><b>YOUR PACK IS COMPLETE!</b></h3>
                <h3 class="bike-no"><b>BIKE NO. 004</b></h3>
            </div>
        
          <h3><img class="icons" src="img/group.png"/><b>GROUP ID: 0945721</b></h3>
          <h4><img class="icons" src="img/station.png"/>Bench Tower Rizal Drive, Taguig City</h4>
          <h4><img class="icons icons-small" src="img/time.png"/>Estimated Time: 10 mins</h4>
          <h4><img class="icons icons-small" src="img/price.png"/>20.00 - 25.00</h4>
       
          <div class="riders-cont">
            <div class="alpha-rider rider-frame"><img src="img/user1.png"/></div>
            <div class="omega-rider rider-frame"><img src="img/user2.png"/></div>
            <div class="omega-rider rider-frame"><img src="img/user1.png"/></div>
            <div class="omega-rider rider-frame"><img src="img/user1.png"/></div>
          </div>
        </div>     

        <div class="main-form-submit start-button"><a href="groupend.php"><i class="fa fa-home"></i>START RIDE!</a></div>
     
        
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