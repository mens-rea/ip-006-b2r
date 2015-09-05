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
        <meta charset="utf-8" />
        <meta name="format-detection" content="telephone=no" />
        <!-- WARNING: for iOS 7, remove the width=device-width and height=device-height attributes. See https://issues.apache.org/jira/browse/CB-4323 -->
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=medium-dpi" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />

        <script type="text/javascript" src="../plugins/iscroll.js"></script>

        <script type="text/javascript" charset="utf-8" src="phonegap-0.9.2.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2"></script>

        <script type="text/javascript" src="js/processing/processing.min.js"></script>  
        <script type="text/javascript" src="js/iscroll.js"></script>
        <script type="text/javascript">
var myScroll;
function loaded() {
    myScroll = new IScroll('#wrapper');
}
</script>

        <title>SHOPPING BUDDY</title>
    </head>
    <body onload="loaded()">

        <div id="header">
                <ul class="menu">    
                    <li><a class="main-menu" href="index.php">HOME</a></li>
                    <li><a class="main-menu" href="available.php">SHOP</a></li>
                    <li><a class="main-menu" href="list.php">CART</a></li>
                    <button  onmouseover="this.style.backgroundColor= '#d32f2f'" onmouseout="this.style.backgroundColor='#f44336'" id="cleardata" onclick="rereload()">CLEAR CART</button>
                </ul>
            <div class="table-properties">ITEM</div><div class="table-properties">AMOUNT</div><div class="table-properties">SUBTOTAL</div>
        </div>

        <div id="wrapper" class="wrapper-list">
        <div id="scroller">
            <ul id="items-container">
            </ul>
        </div>
        </div>

        <div id="footer">
            <label>TOTAL: <span id="total-amount"></span></label>
        </div>

        <script type="text/javascript" src="js/index.js"></script>
              <script type="text/javascript">
function myFunction() {
    location.reload();
}
</script>
        <script type="text/javascript">
            app.initialize();

            Storage.prototype.setArray = function(key, obj) {
                        return this.setItem(key, JSON.stringify(obj))
            }
                Storage.prototype.getArray = function(key) {
                        return JSON.parse(this.getItem(key))
            }

            var shoppingCart = new Array();

            shoppingCart = window.localStorage.getArray("Cart");

            var sumtotal = 0.00;
            if(window.localStorage.getArray("Cart")!=null){
                for (var i = 0; i < shoppingCart.length; i++) {
                        var z = document.createElement("li");
                        var t = document.createTextNode(shoppingCart[i].carttitle+" ("+shoppingCart[i].carttimes+") - "+parseFloat(shoppingCart[i].cartprice)*parseFloat(shoppingCart[i].carttimes));
                        z.appendChild(t);

                        var int1 = parseFloat(shoppingCart[i].carttimes);
                        var int2 = parseFloat(shoppingCart[i].cartprice);
                        var int3 = int1*int2;
                        sumtotal = sumtotal + int3;
                        //alert(sumtotal);

                        document.getElementById('items-container').appendChild(z);
                }
            }
            var tot;
            if(sumtotal==0.00||sumtotal==""){
                tot = document.createTextNode("Php 0.00");
                document.getElementById("items-container").innerHTML = "<div class='defaultMessage'>No items yet...</div>";
            }
            else{
                tot = document.createTextNode("Php "+sumtotal);
            }
            
            document.getElementById('total-amount').appendChild(tot);

            loaded();

            var myScroll;

            function loaded () {
                myScroll = new IScroll('#wrapper', { mouseWheel: true });
            }

            document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);

            function rereload(){
                location.reload();
            }
        </script>

        <script type="text/javascript">
            app.initialize();

            var test = document.getElementById("cleardata");

            function whatClicked(evt) {
                if(evt.target.id=="cleardata"){
                    window.localStorage.removeItem('Cart');
                }
            }

            test.addEventListener("click", whatClicked, false);
        </script>

        
    </body>
</html>
