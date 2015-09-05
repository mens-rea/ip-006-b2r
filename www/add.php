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

        <script type="text/javascript" charset="utf-8" src="phonegap-0.9.2.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2"></script>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <script type="text/javascript" src="js/processing/processing.min.js"></script>  

        <title>SAPUL</title>
    </head>
    <body>
        <!--
        <canvas id="myDrawing" data-processing-sources="hello-web.pde">
        <p>Your browser doesn't support canvas.</p>
        </canvas>
        -->
        <a class="gb-menu-items" href="index.php"><div style="background-color: #0288D1; color:#b3e5fc;"><i class="fa fa-home"></i> HOME</div></a>

      <form style="padding-left:10%; padding-right:10%; padding-bottom:10%;">
            <!--<label>NAME: </label>-->
            <input id="name" field="text" placeholder="Name"
            style="border: 1px solid #607d8b;
                         width: 100%; 
                         text-align: center;
                     font-family:'HelveticaNeue-Light', 'HelveticaNeue', Helvetica, Arial, sans-serif;
                         height: 100px; 
                         font-size: 2em; 
                         padding: 2%; 
                         font-weight: 60;
                         margin-top:5px;
                         margin-bottom:5px;"/>
            <!--<label>PRICE: </label>-->
            <input id="price" field="text" placeholder="Price"
            style="border: 1px solid #607d8b; 
                         width: 100%; 
                         text-align: center;
                     font-family:'HelveticaNeue-Light', 'HelveticaNeue', Helvetica, Arial, sans-serif;
                         height: 100px; 
                         font-size: 2em; 
                         padding: 2%; 
                         font-weight: 60;
                         margin-bottom:5px;"/>
            <button id="submit-button"
            style="border: 1px solid #607d8b; 
                         width: 100%; 
                         text-align: center;
                     font-family:'HelveticaNeue-Light', 'HelveticaNeue', Helvetica, Arial, sans-serif;
                         height: 100px; 
                         font-size: 1.5em; 
                         padding: 2%; 
                         font-weight: 60;
                         background-color: #607d8b; color:#cfd8dc;"><i class="fa fa-plus-square-o fa-3x"></i> </button>
        </form>
        <!--<div id="items-container">
            <div class="gb-grocery-items half-wit"><div class="gb-grocery-items-inner">CHEESE - Php 100.00 <a id="item-1" name="cheese" href="#">ADD TO CART</a></div></div>
            <div class="gb-grocery-items half-wit"><div class="gb-grocery-items-inner">COKE - Php 25.00 <a id="item-2" name="coke" href="#">ADD TO CART</a></div></div>
        </div>-->

        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript">
            app.initialize();

            var storedNames;
            var names = [];
            localStorage["key"] = "0";
            var index;

            var test = document.getElementById("submit-button");

            Storage.prototype.setArray = function(key, obj) {
                        return this.setItem(key, JSON.stringify(obj))
            }
                Storage.prototype.getArray = function(key) {
                        return JSON.parse(this.getItem(key))
            }

            var gatheredPosts = new Array();

            if(window.localStorage.getArray("cachedPosts") != null){
                gatheredPosts = window.localStorage.getArray("cachedPosts");
            }

            window.localStorage.setArray("cachedPosts", gatheredPosts);

          /*  for (var i = 0; i < gatheredPosts.length; i++) {
                    var x = document.createElement("div");
                    var t = document.createTextNode(gatheredPosts[i].title+": "+gatheredPosts[i].price);
                    x.appendChild(t);
                    document.body.appendChild(x);
            }*/


            function whatClicked(evt) {
                /*
                alert("Submitted!");
                alert(document.getElementById("name").value);
                alert(document.getElementById("price").value);
                */
                /*
                index = parseInt(localStorage["key"]);

                names[index] = prompt("New member name?");
                
                index=index+1;
                alert(index);
                localStorage["key"] = index;
                
                localStorage["names"] = JSON.stringify(names);

                alert(localStorage["key"]);

                storedNames = JSON.parse(localStorage["names"]);
                */
                /*
                var names = [];
                names[2] = prompt("New member name?");
                localStorage["names"] = JSON.stringify(names);


                var storedNames = JSON.parse(localStorage["names"]);
                alert(storedNames);
                */
                Storage.prototype.setArray = function(key, obj) {
                        return this.setItem(key, JSON.stringify(obj))
                }
                    Storage.prototype.getArray = function(key) {
                        return JSON.parse(this.getItem(key))
                }

                var gatheredPosts = new Array();

                gatheredPosts = window.localStorage.getArray("cachedPosts");

                gatheredPosts.push({title:document.getElementById("name").value, price:document.getElementById("price").value});
                //alert("hello");
                window.localStorage.setArray("cachedPosts", gatheredPosts);
            }

            test.addEventListener("click", whatClicked, false);
        </script>

        
    </body>
</html>
