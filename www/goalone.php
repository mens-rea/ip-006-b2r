<!DOCTYPE html>
<!--
    Licensed to the Apache Software Foundation (ASF) under one
    or more contributor license agreements.  See the NOTICE file
    distributed with this work for additional information
    regarding copyright ownership.  The ASF licenses this file
    to you under the Apache License, Version 2.0 (the
    "License"); you may not use this file except in compliance
    with the License.  You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing,
    software distributed under the License is distributed on an
    "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
     KIND, either express or implied.  See the License for the
    specific language governing permissions and limitations
    under the License.
-->
<html>
    <head>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">

        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <style>

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100%;
        }
        .controls {
          margin-top: 10px;
          border: 1px solid transparent;
          border-radius: 2px 0 0 2px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
          height: 32px;
          outline: none;
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        #pac-input {
          background-color: #fff;
          font-family: Roboto;
          font-size: 15px;
          font-weight: 300;
          margin-left: 12px;
          padding: 0 11px 0 13px;
          margin-top: 40px;
          text-overflow: ellipsis;
          width: 300px;
        }

        #pac-input:focus {
          border-color: #4d90fe;
        }

        .pac-container {
          font-family: Roboto;
        }

        #type-selector {
          color: #fff;
          background-color: #4d90fe;
          padding: 5px 11px 0px 11px;
        }

        #type-selector label {
          font-family: Roboto;
          font-size: 13px;
          font-weight: 300;
        }

        </style>
        <title>Places Searchbox</title>
        <style>
          #target {
            width: 345px;
          }
        </style>
    </head>

    <body>
        <div id="map"></div>

         <div class="message-overlay">
         </div>

          <div class="warning-cont">
            <p>For your own safety we advise going with a group. By pressing "Continue", you certify that agree to the terms and conditions.</p>

            <div id="go-alone-insist" class="main-form-submit" href="start.php"><a href="startride.php">CONTINUE</a></div>
          </div>


         <div class="group-cont">
          <h3><b>Group Id: 0945721</b></h3>
          <h4>Bench Tower Rizal Drive, Taguig City</h4>
          <h4>Estimated Time: 10 mins</h4>
          <div class="riders-cont">
            <div class="alpha-rider rider-frame"></div>
            <div class="omega-rider rider-frame"></div>
            <div class="omega-rider rider-frame"></div>
            <div class="omega-rider rider-frame"></div>
          </div>
          <a id="go-alone" class="group-options" href="goalone.php">Go Alone</a><a class="group-options" href="start.php">Cancel</a>
        </div>

        <div class="station-cont">
            <div>Found 3 Stations near you. Select One.</div>
            <div><a href="startride.php">Ayala MRT (closest)</a></div>
            <div><a href="formgroup.php">Vito Cruz</a></div>
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

              // Create the search box and link it to the UI element.
              var input = document.getElementById('pac-input');
              var searchBox = new google.maps.places.SearchBox(input);
              map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

              // Bias the SearchBox results towards current map's viewport.
              map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
              });

              var markers = [];
              // [START region_getplaces]
              // Listen for the event fired when the user selects a prediction and retrieve
              // more details for that place.
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
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"
             async defer></script>

    </body>
</html>
