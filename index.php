<?php

 include("header1.php");

$_SESSION['url'] = $_SERVER['REQUEST_URI'];
require 'config.php';
$dbc = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());

if($_SESSION['error'] != 0){
    echo "<script>alert('Please select the city');</script>";
}
$_SESSION['username'] = "Master Logarius";
$_SESSION['error'] = 0;
$sql20 = "SELECT count(*) as totaluser FROM users";
$result10 = $dbc->query($sql20);
$row=$result10->fetch_object();
$totalusers =$row->totaluser+2000;
$sql2 = "SELECT * FROM category";
$result1 = $dbc->query($sql2);

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $('.count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    });
</script>

<script>
function getLocation(){

        var str=document.getElementById("myCity").value;
        if (str == "") {
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("my").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","setCity.php?city="+str+"",true);

            xmlhttp.send();
        }
    }
    function getLocation2(){
            var str=document.getElementById("myCity2").value;
            alert("City="+str);
            if (str == "") {
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("my2").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","setCity.php?city="+str+"",true);

                xmlhttp.send();
            }
        }
    </script>


<div class="row">
    <div id="carousel-cover" class="col-md-6 carousel">
        <div id="home-affx" class="carousel-inner hidden-xs hidden-sm" data-spy="affix" data-offset-top="0"  data-offset-bottom="1160">
              <div class="item active" id="carousel-background" style="z-index: -1">
                <div id="carousel001" class="carousel-caption">
                    <h2>The Best</h2>
                    <p class="lead">Repair services <strong>India </strong>has</p>
                    <div class="form-group">
                        <label class="control-label">City </label>
                        <select class="form-control input-lg" id="myCity" name="city" onchange="getLocation()">
                            <option value="">--Location--</option>
                            <?php
                            $sql1 = "SELECT DISTINCT city_name FROM location";
                            $result = $dbc->query($sql1);
                            while($row = $result->fetch_object()){
                                echo "<option value='$row->city_name'>".$row->city_name."</option>";
                            }
                            ?>
                            <input type="hidden" id="my">
                        </select>
                    </div>
                </div>
                <div id="carousel002" class="carousel-caption">
                    <h2 class="text-center"><div id="shiva"><span class="count">2000</span>+</div></h2>
                    <p class="lead">Customer Served</p>
                </div>
                <div id="carousel003" class="carousel-caption">
                    <h2 class="text-center"><div id="shiva"><span class="count">20</span></div> </h2>
                    <p class="lead">Experts</p>
                </div>
            </div>
        </div>
        <div class="carousel-inner visible-xs-block visible-sm-block hidden-md">
              <div class="item active" id="carousel-background">
                <div id="carouse2001" class="carousel-caption">
                    <h2>The Best</h2>
                    <p class="lead">Repair services <strong>India </strong>has</p>
                    <div class="form-group">
                        <label class="control-label">City </label>
                        <select class="form-control input-lg" id="myCity2" name="city" onchange="getLocation2()">
                            <option value="">--Location--</option>
                            <?php
                            $sql1 = "SELECT DISTINCT city_name FROM location";
                            $result = $dbc->query($sql1);
                            while($row = $result->fetch_object()){
                                echo "<option value='$row->city_name'>".$row->city_name."</option>";
                            }
                            ?>
                            <input type="hidden" id="my2">
                        </select>
                    </div>

                </div>
                <div id="carouse2002" class="carousel-caption">
                    <h2 class="text-center"><div id="shiva"><span class="count">2000</span>+</div></h2>
                    <p class="lead">Customer Served</p>
                </div>
                <div id="carouse2003" class="carousel-caption">
                    <h2 class="text-center"><div id="shiva"><span class="count">20</span></div> </h2>
                    <p class="lead">Experts</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" id="devicesPanel">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="gadget-p new-panel new-panel-info">
                    <div class="new-panel-heading">
                        <strong style="color:#87add1;font-family:'slant', sans-serif; font-size:27px;">SELECT DEVICE </strong>
                      </div>
                    <div class="panel-body emergency">
                        <?php
                        while($row2 = $result1->fetch_object()){
                        ?>
                        <a href="index2.php?gadget=<?php echo $row2->category_id; ?>" style="margin-left:10px" class="thumbnail select-device col-md-3 col-sm-3 col-xs-5 padding0 "  ><center><img src="assets/img/category/<?php echo $row2->image; ?>" width="80px" responsive></center><!--<i class="fa fa-mobile fa-4x fa-lg" aria-hidden="true"></i>--></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div id="get_wet" class="new-panel new-panel-default">
                    <div class="new-panel-heading">
                      <strong style="color:#f26e6a;font-family:'slant', sans-serif; font-size:27px">GOT YOUR PHONE WET !</strong>
                    </div>
                    <div class="panel-body emergency">
                        <img src="assets/img/swimming.png" class="thumbnail margin-0-tb col-md-2 col-sm-2 col-xs-3" responsive>
                        <img src="assets/img/cloud_rain.png" class="thumbnail margin-0-tb col-md-2 col-sm-2 col-xs-3">
                        <img src="assets/img/toilet.png" class="thumbnail margin-0-tb col-md-2 col-sm-2 col-xs-3" >
                        <img src="assets/img/ambulance.png" class="thumbnail margin-0-tb col-md-2 col-sm-2 col-xs-3 col-sm-offset-3 ">
                    </div>
                    <div class="panel-footer text-right"><span style="color:#f26e6a; border:2px; border-style:solid;padding: 5px 5px 5px 5px"><strong>We Run An Emergency Service</strong></span></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6 padding0"><img src="assets/img/authentication.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">Authentic servicing </h5></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6 padding0"><img src="assets/img/support_time.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">24 x 7 Support </h5></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6 padding0"><img src="assets/img/price_tag.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">Resonable Rates </h5></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6 padding0"><img src="assets/img/delivery_truck.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">One Day Delivery</h5></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6"><img src="assets/img/warrenty card.png">
                    <center><div class="caption" style="padding-bottom:5px">
                            <span class="text-nowrap text-info">Three Months <br> Additional Warrenty </span></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6"><img src="assets/img/mobile.png">
                    <center><div class="caption" style="padding-bottom:5px">
                            <span class="text-nowrap text-info">Backup<br> Phone Included</span></div></center>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-10 col-md-offset-1" style="border:2px; border-style:solid;border-color:#f26e6a;margin-top:20px;">
            <div class="row">
              <div class="col-xs-12">
                <center style="color:#f26e6a"><b>ANNUAL MAINTAINCE PACKAGES</b></center>
              </div>
              <div class="col-xs-12">
                <div  class="thumbnail col-xs-4" style="border:0px">
                  <img src="assets/img/annual packedges/p1.png">
                  <div class="caption text-center" style="margin-top:5px;padding:0px 0px 0px 0px;border:2px; border-style:solid; border-color:#f26e6a; color:#f26e6a; "><b>Details<br>Rs. 499</b></div>
                </div>
                <div  class="thumbnail col-xs-4" style="border:0px">
                  <img src="assets/img/annual packedges/p2.png">
                  <div class="caption text-center" style="margin-top:5px;padding:0px 0px 0px 0px;border:2px; border-style:solid; border-color:#f26e6a; color:#f26e6a; "><b>Details<br>Rs. 699</b></div>
                </div>
                <div  class="thumbnail col-xs-4" style="border:0px">
                  <img src="assets/img/annual packedges/p3.png">
                  <div class="caption text-center" style="margin-top:5px;padding:0px 0px 0px 0px;border:2px; border-style:solid; border-color:#f26e6a; color:#f26e6a; "><b>Details<br>Rs. 999</b></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
            <div class="row">
              <div class="col-xs-12 rm-margin">
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:5px">
                  <img src="assets/img/veryfied.png">
                  <div class="caption text-center" style="padding:0px 0px 0px 0px;color:#87add1; ">Verified Professionals</div>
                </div>
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:15px">
                  <img src="assets/img/insured_guard.png">
                  <div class="caption text-center" style="padding:0px 0px 0px 0px;color:#87add1; ">Authorized Servicing</div>
                </div>
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:15px">
                  <img src="assets/img/smile.png">
                  <div class="caption text-center" style="padding:0px 0px 0px 0px;color:#87add1; ">Satisfaction Guaranteed</div>
                </div>
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:15px">
                  <img src="assets/img/tracking.png">
                  <div class="caption text-center" style="padding:0px 0px 0px 0px;color:#87add1; ">Live Tracking</div>
                </div>
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:15px">
                  <img src="assets/img/payment.png">
                  <div id="how-it-works" class="caption text-center" style="padding:0px 0px 0px 0px;color:#87add1; ">Easy Payment</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" >
          <div class="col-md-10 col-md-offset-1" style="margin-top:20px">
            <div class="row">
              <div class="col-xs-12">
                <center style="color:#f26e6a;font-family:'Quantify', sans-serif; font-size:15px"><b>HOW IT WORKS</b></center>
              </div>
              <div class="col-xs-12 rm-margin">
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:5px">
                  <img src="assets/img/how it work/report.png">
                  <div class="caption text-center text-nowrap" style="padding:0px 0px 0px 0px;color:#f26e6a; ">Self Diagnose<br>Through our<br> app </div>
                </div>
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:15px">
                  <img src="assets/img/how it work/device.png">
                  <div class="caption text-center" style="padding:0px 0px 0px 0px;color:#f26e6a; ">Select Device</div>
                </div>
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:15px">
                  <img src="assets/img/how it work/set_location.png">
                  <div class="caption text-center" style="padding:0px 0px 0px 0px;color:#f26e6a; ">Select Date/Pickup</div>
                </div>
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:15px">
                  <img src="assets/img/how it work/setteld.png">
                  <div class="caption text-center" style="padding:0px 0px 0px 0px;color:#f26e6a; ">Get it Settled</div>
                </div>
                <div  class="thumbnail col-xs-2" style="border:0px;margin-left:15px">
                  <img src="assets/img/how it work/kart.png">
                  <div class="caption text-center" style="padding:0px 0px 0px 0px;color:#f26e6a; ">Recieve it</div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="row" style="padding-top:48px; background: #EAE7E7;" >
    <div class="col-sm-6 hidden-xs" id=" "><center><img src="assets/img/phone.png"></center></div>
    <div class="col-sm-6">
        <div class="jumbotron home-jumbo" style="background-color:transparent">
            <center><span style="font-size:26px"><strong style="color:#f26e6a; ">Book a repair</strong> anywhere</span> </center>
            <br>
            <p class="text-center">Diagnose, book a repair, or just know an estimate of repair on the <strong style="color:#f26e6a">GO</strong></p>
            <p class="text-center text-primary">Download <strong><span style="color:#f26e6a">Settle</span><span style="color:#31708f">Metal</span></strong> App Now</p>
            <div class="input-group input-groupuser">
                <div id="in" class="input-group-addon"><span>+91</span></div>
                <input id="in2" class="form-control input-lg" type="text" placeholder="Mobile Number">
                <div class="input-group-btn">
                    <button class="btn btn-success btn-lg" type="button" style="padding:15px 5px 10px 5px" data-container="body" data-toggle="popover" data-placement="top" data-content="Comming Soon">Get App</button>
                </div>
            </div>
            <hr>
            <p><h6 class="text-center">or get directly from</h6></p>
            <center><button id="btnplaystore" class="btn btn-primary" type="button"></button><br><span>Coming Soon</span></center>
        </div>
    </div>
</div>
<div class="row" style="margin-top:10px;">
    <div id="carousel-example-generic" class="col-md-12 carousel slide" data-ride="carousel">
        <div id="carousel-l-r" class="carousel-inner container"  style="padding-bottom:0px;">
          <div class="item active ">
            <div class="col-md-3">
                <div class="thumbnail  user-review"><img class="img-circle" src="assets/user_img/abhinav.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">Anubhav Singh Chauhan</h3>
                        <h4 class="text-center">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                        </h4>
                        <p class="text-justify">Got my mobile serviced twice from settlemetal and found its pretty easy and pocket friendly.
                           You should give try to settlemetal at least once. #settlemetal keep this good work up.</p>
                           <p>&nbsp;</p><p></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail user-review"><img class="img-circle" src="assets/user_img/pracheer.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">Pracheer Agarwal</h3>
                        <h4 class="text-center">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                        </h4>
                        <p class="text-justify">Excellent Service, Very humble people. Saved us a ton of money.
                            Official service center of Apple said that my Iphone is gone. They were charging 27K for replacement.
                             Fortunately I came across these guys. Saved us from official service centers goons. Highly recommended</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail user-review"><img class="img-circle" src="assets/user_img/megha.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">Megha Luthra</h3>
                        <h4 class="text-center">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                        </h4>
                        <p class="text-justify">An amazing source to get your gadgets repaired! Techie God! Savior to the damaged gadgets!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail user-review"><img class="img-circle" src="assets/user_img/vishal agarwal.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">Vishal Aggarwal</h3>
                        <h4 class="text-center">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                        </h4>
                        <p class="text-justify">Exquisite service and quite a speedy one too. The rates are pretty genuine and these guys can be trusted. Hats off.</p>
                    </div>
                </div>
            </div>
          </div>
          <div class="item ">
            <div class="col-md-3">
                <div class="thumbnail user-review"><img class="img-circle" src="assets/user_img/jasmine.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">Jasmine Singh</h3>
                        <h4 class="text-center">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                        </h4>
                        <p class="text-justify">Love it.Amazing service. Will definitely use it again. :).</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail user-review"><img class="img-circle" src="assets/user_img/shashank.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">Shashank Nath</h3>
                        <h4 class="text-center">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                        </h4>
                        <p class="text-justify">The sevice they provide are amazing. The repairs and the time for repairs they took was reasonable. I would totally recommend other people to experience their services.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail user-review"><img class="img-circle" src="assets/user_img/mohit.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">Mohit Sharma</h3>
                        <h4 class="text-center">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                        </h4>
                        <p class="text-justify">One of the best service I've experienced. They do a very good work at repairing the phone and best part is that they keep posting about the step they are taking with their repairs and process.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail user-review"><img class="img-circle" src="assets/user_img/soham.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">Soham Basak</h3>
                        <h4 class="text-center">
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                          <span class="glyphicon glyphicon-star"></span>
                        </h4>
                        <p class="text-justify">Got my mobile serviced from settlemetal and found its pretty easy and pocket friendly. You should give try to at least once..</p>
                    </div>
                </div>
            </div>
          </div>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
        </div>
    </div>
</div>

<?php include("footer.php") ?>
