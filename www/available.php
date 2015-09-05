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
        <script type="text/javascript" src="js/iscroll.js"></script>
         <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <script type="text/javascript" src="js/processing/processing.min.js"></script>  
<script type="text/javascript">

var myScroll;
function loaded() {
    myScroll = new IScroll('#wrapper');
}
</script>
        <title>GROCER'S BUDDY</title>
    </head>
    <body onload="loaded()">
            <div id="header">
         <ul class="menu">
                <li><a class="main-menu" href="index.php"><i class="fa fa-home"></i> HOME</a></li>
                <li><a class="main-menu" href="list.php"><i class="fa fa-shopping-cart"></i> CART</a></li>
            </ul>
        </div>

        <div id="wrapper">
        <div id="scroller">
            <ul id="items-container">
                
            </ul>
        </div>
        </div>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript">
            app.initialize();

            Storage.prototype.setArray = function(key, obj) {
                        return this.setItem(key, JSON.stringify(obj))
            }
                Storage.prototype.getArray = function(key) {
                        return JSON.parse(this.getItem(key))
            }

            var gatheredPosts = new Array();

            gatheredPosts = window.localStorage.getArray("cachedPosts");


            for (var i = 0; i < gatheredPosts.length; i++) {
                    var linkText = document.createTextNode("+ add me to cart");
                    var link = document.createElement("a");
                    var divcont = document.createElement("div");
                    var divcont2 = document.createElement("div");
                    divcont.className = "element-container";
                    divcont2.className = "element-container2"
                    link.value = i;
                    link.id = "item"+i;
                    link.href = "#";
                    link.appendChild(linkText);
                    var x = document.createElement("div");
                    x.className="gb-grocery-items-inner"
                    var y = document.createElement("div");
                    y.className="gb-grocery-items"
                    var z = document.createElement("li")
                    var t = document.createTextNode(gatheredPosts[i].title);
                    var tt = document.createTextNode("Price: "+gatheredPosts[i].price);
                    divcont.appendChild(t);
                    divcont2.appendChild(tt);
                    x.appendChild(divcont);
                    x.appendChild(divcont2);
                    x.appendChild(link);
                    y.appendChild(x);
                    z.appendChild(y);
                    document.getElementById('items-container').appendChild(z);

                    var clicker = document.getElementById("item"+i);

                    clicker.addEventListener("click", whatClicked, false);
            }

            loaded();

            var test = document.getElementById("item-1");
            var test2 = document.getElementById("item-2");

            function whatClicked(evt) {
                 Storage.prototype.setArray = function(key, obj) {
                        return this.setItem(key, JSON.stringify(obj))
                }
                    Storage.prototype.getArray = function(key) {
                            return JSON.parse(this.getItem(key))
                }

                var shoppingCart = new Array();

                if(window.localStorage.getArray("Cart") != null){
                    shoppingCart = window.localStorage.getArray("Cart");
                }
                gatheredPosts = window.localStorage.getArray("cachedPosts");

                var times
                times = prompt("How Many?");
                //alert("times"+times);
                shoppingCart.push({carttitle:gatheredPosts[evt.target.value].title, cartprice:gatheredPosts[evt.target.value].price, carttimes: times});
               
                /*
                for (var ctr = 0; ctr < shoppingCart.length; ctr++) {
                    alert(ctr+": "+shoppingCart[ctr].carttitle);
                }
                */

                window.localStorage.setArray("Cart", shoppingCart);
            }

            test.addEventListener("click", whatClicked, false);
            test2.addEventListener("click", whatClicked, false);

            var myScroll;

            function loaded () {
                myScroll = new IScroll('#wrapper', { mouseWheel: true });
            }

            document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
        </script>

        
    </body>
</html>
