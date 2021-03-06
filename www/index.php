<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <!-- WARNING: for iOS 7, remove the width=device-width and height=device-height attributes. See https://issues.apache.org/jira/browse/CB-4323 -->
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=medium-dpi" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <title>KALESA</title>
    </head>

    <body>
        
        <img class="landing-brand" src="img/b2r_logo.png" />

        <h3 class="slogan">MEET . SAVE . BIKE</h3>
        <form class="log-form-cont">
            <div class="main-field-cont"><input name="username" placeholder="Enter Email Address" type="text" /></div>
            <div class="main-field-cont"><input name="password" placeholder="Password" type="text" /></div>
            <div class="field-remember">Remember me</div>
            <div class="field-forgot">Forgot your password</div>
            <div class="main-form-submit"><a href="destination.php">LOG IN</a></div>
            <!-- <input class="main-form-submit" type="submit" value="LOG IN"> -->
        </form>

        <h6>not yet registered? create an account</h6>
         <a id="join-button" class="gb-menu-items" href="index.php"><i class="fa fa-plus"></i>RIDE</a> 
        

        <script type="text/javascript">
            function myFunction() {
                location.reload();
            }
        </script>

        <script type="text/javascript" src="js/index.js"></script>
        
        <script type="text/javascript">
            app.initialize();

            var test = document.getElementById("cleardata");

            function whatClicked(evt) {
                if(evt.target.id=="cleardata"){
                    window.localStorage.clear();
                }
            }

            test.addEventListener("click", whatClicked, false);
        </script>

        
        <script type="text/javascript" charset="utf-8" src="phonegap-0.9.2.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2"></script>

        <script type="text/javascript" src="js/processing/processing.min.js"></script>  
        <script type="text/javascript" src="js/iscroll.js"></script>
    </body>
</html>
