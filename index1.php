
<?php include("header1.php");
$_SESSION['username'] = "Master Logarius";
$_SESSION['error'] = 0;
?>

<div class="row">
    <div class="col-md-6 carousel">
        <div class="carousel-inner">
            <div class="item active" id="carousel-background">
                <div id="carousel001" class="carousel-caption">
                    <h2>The Best</h2>
                    <p class="lead">Repair services <strong>India </strong>has</p>
                    <div class="input-group">
                        <div class="input-group-addon"><span>City </span></div>
                        <input class="form-control input-lg" type="text" placeholder="Search your device">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-lg" type="button">Search </button>
                        </div>
                    </div>
                </div>
                <div id="carousel002" class="carousel-caption">
                    <h2 class="text-center">200 </h2>
                    <p class="lead">Customer Served</p>
                </div>
                <div id="carousel003" class="carousel-caption">
                    <h2 class="text-center">20 </h2>
                    <p class="lead">Experts</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" id="devicesPanel">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="new-panel new-panel-info">
                    <div class="new-panel-heading">
                        <h3 class="panel-title">Select Device</h3></div>
                    <div class="panel-body">
                        <a href="index2.php?gadget=mobile" class="thumbnail col-md-3 col-sm-3 col-xs-6 padding0 select-device"  style="font-size:25px; text-align:center"><i class="fa fa-mobile fa-4x fa-lg" aria-hidden="true"></i></a>
                        <a href="index2.php?gadget=tablet" class="thumbnail col-md-3 col-sm-3 col-xs-6 padding0 select-device" style="font-size:25px; text-align:center"><i class="fa fa-tablet fa-3x " aria-hidden="true"></i></a>
                        <a href="index2.php?gadget=laptop" class="thumbnail col-md-3 col-sm-3 col-xs-6 padding0 select-device " style="font-size:25px; text-align:center"><i class="fa fa-laptop fa-3x " aria-hidden="true"></i></a>
                        <a href="index2.php?gadget=camera" class="thumbnail col-md-3 col-sm-3 col-xs-6 padding0 select-device " style="font-size:31px; text-align:center; padding-top:14px"><i class="fa fa-camera fa-2x " aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="new-panel new-panel-default">
                    <div class="new-panel-heading">
                        <h3 class="panel-title">Got your phone wet</h3></div>
                    <div class="panel-body">
                        <img src="assets/img/swimming.png" class="col-md-3 col-sm-3 col-xs-3">
                        <img src="assets/img/cloud_rain.png" class="col-md-3 col-sm-3 col-xs-3">
                        <img src="assets/img/toilet.png" class="col-md-3 col-sm-3 col-xs-3">
                        <img src="assets/img/ambulance.png" class="col-md-3 col-sm-3 col-xs-3">
                    </div>
                    <div class="panel-footer text-right"><span style="color:#ff4200"><strong>We Run An Emergency Service</strong></span></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6 padding0"><img src="assets/img/authentication.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">Authentic servicing </h5></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6 padding0"><img src="assets/img/support_time.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">Authentic servicing </h5></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6 padding0"><img src="assets/img/price_tag.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">Authentic servicing </h5></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6 padding0"><img src="assets/img/delivery_truck.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">Authentic servicing </h5></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6"><img src="assets/img/warrenty card.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">Authentic servicing </h5></div></center>
                </div>
                <div class="new-thumbnail col-md-4 col-sm-4 col-xs-6"><img src="assets/img/mobile.png">
                    <center><div class="caption">
                            <h5 class="text-nowrap text-info">Authentic servicing </h5></div></center>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mydiv">
    Content goes here
</div>
<div class="row" style="padding-top:20px" >
    <div class="col-md-4 col-sm-5 hidden-xs col-md-offset-1 " id=" "><img class="img-responsive col-md-9 col-md-offset-1" src="assets/img/phone.png" width="250px" height="500px" id=" "></div>
    <div class="col-md-5 col-sm-6 col-md-offset-1 col-sm-offset-1">
        <div class="jumbotron" style="background-color:transparent">
            <center><span style="font-size:45px"><strong style="color:#ff4d40; ">Book a repair</strong> anywhere</span> </center>
            <p class="text-center">Diagnose, book a repair, or just know an estimate of repair on the <strong style="color:#ff4d40">GO</strong></p>
            <p class="text-center text-primary">Download <strong><span style="color:#ff4d40">Settle</span>Metal</strong> App Now</p>
            <div class="input-group input-groupuser">
                <div class="input-group-addon"><span>+91</span></div>
                <input class="form-control input-lg" type="text" placeholder="Mobile Number">
                <div class="input-group-btn">
                    <button class="btn btn-success btn-lg" type="button">Get App</button>
                </div>
            </div>
            <hr>
            <p class="text-center text-muted">or get directly from</p>
            <center><button id="btnplaystore" class="btn btn-primary" type="button"><span style="padding-left:35px">Play Store</span></button></center>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="container">
            <div class="col-md-3">
                <div class="thumbnail"><img class="img-circle" src="assets/user_img/1isto1.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">User Name</h3>
                        <p class="text-justify">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail"><img class="img-circle" src="assets/user_img/1isto1.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">User Name</h3>
                        <p class="text-justify">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail"><img class="img-circle" src="assets/user_img/1isto1.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">User Name</h3>
                        <p class="text-justify">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail"><img class="img-circle" src="assets/user_img/1isto1.jpg" width="100px" height="100px">
                    <div class="caption">
                        <h3 class="text-center">User Name</h3>
                        <p class="text-justify">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php") ?>
