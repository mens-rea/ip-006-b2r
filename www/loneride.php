  <?php include('header.php'); ?>

        <div id="map"></div>

         <div class="message-overlay">
         </div>

          <div class="group-cont warning-cont">
            <p>For your own safety we advise going with a group. By pressing "Continue", you certify that agree to the terms and conditions.</p>

            <a id="go-alone" class="group-options" href="loneridestart.php">Continue</a><a id="cancel" class="group-options" href="destination.php">Cancel</a>
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

  <?php include('footer.php'); ?>