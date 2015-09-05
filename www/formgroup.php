  <?php include('header.php'); ?>

    
        <div id="map"></div>

         <div class="group-cont">
          <h3><img class="icons" src="img/group.png"/><b>Group ID: 0945721</b></h3>
          <h4><img class="icons" src="img/station.png"/>Bench Tower Rizal Drive, Taguig City</h4>
          <h4><img class="icons icons-small" src="img/time.png"/>Estimated Time: 10 mins</h4>
          <h4><img class="icons icons-small" src="img/price.png"/>20.00 - 25.00</h4>
          <div class="riders-cont">
            <div class="alpha-rider rider-frame"><img src="img/user1.png"/></div>
            <div class="omega-rider rider-frame"><img src="img/user2.png"/></div>
            <div class="omega-rider rider-frame"><img src="img/loading.png"/></div>
            <div class="omega-rider rider-frame"><img src="img/loading.png"/></div>
          </div>
          <a id="go-alone" class="group-options" href="loneride.php">Go Alone(1)</a><a id="cancel" class="group-options" href="start.php">Cancel</a>
        </div>

        <div class="station-cont">
            <div>Found 3 Stations near you. Select One.</div>
            <div><a href="startride.php">Ayala MRT (closest)</a></div>
            <div><a href="formgroup.php">Vito Cruz</a></div>
            <div><a href="formgroup.php">Ayala Triangle</a></div>
        </div>

        <!-- <a id="join-button" class="gb-menu-items" href="destination.php" style="position: fixed; z-index: 2; bottom: 0; display: block;"><i class="fa fa-plus"></i>SELECT DESTINATION</a>  -->
    
    <?php include('footer.php'); ?>