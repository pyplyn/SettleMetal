<?php
ob_start();
require 'config.php';

include 'header1.php';
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
//check the city parameters
if($_SESSION['city'] == ""){
    $_SESSION['error'] = 1;
}

if($_SESSION['error'] != 0){
    echo "<script>alert('Please select the city')</script>";
    header('Location:index.php');

}


//end

$category1 = $_GET['gadget'];

$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);

//for category name in the panel

$sql3 = "SELECT * FROM category WHERE category_id=$category1";

$result3 = $db->query($sql3);

$row3 = $result3->fetch_object();

$category = $row3->category_name;



//end of it

$sql = "SELECT * FROM devices WHERE category = $category";

$result = $db->query($sql);

//for category dynamically fetched

$sql2 = "SELECT * FROM category";

$result1 = $db->query($sql2);

?>

<div id="myCarousel" class="carousel slide new-row " style="margin: 50px 0px 10px 0px" data-ride="carousel">

    <!-- Indicators -->

    <ol class="carousel-indicators">

        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

        <li data-target="#myCarousel" data-slide-to="1"></li>

        <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>



    <!-- Wrapper for slides -->

    <div class="carousel-inner" role="listbox">

        <div class="item active">

            <img src="assets/img/carusel/offer1.jpg" alt="Chania">

        </div>



        <div class="item">

            <img src="assets/img/carusel/offer2.jpg" alt="Chania">

        </div>

        <div class="item">

            <img src="assets/img/carusel/offer3.jpg" alt="Flower">

        </div>

    </div>



    <!-- Left and right controls -->

    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">

        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>

        <span class="sr-only">Previous</span>

    </a>

    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">

        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>

        <span class="sr-only">Next</span>

    </a>

</div>


<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
    <center><h3 class="panel-title" style="font-family: Slant; font-size: 2.7em; color: #87add1">Select Device</h3></center>
  </div>
  </div>
      <div class="row">
          <div class="col-sm-6 col-sm-offset-4">
              <div class="new-panel">
                  <div class="panel-body">
                    <center>
                      <?php
                      while($row2 = $result1->fetch_object()){
                          ?>
                          <a href="index2.php?gadget=<?php echo $row2->category_id; ?>" style="margin-right:10px" class="thumbnail col-md-2 col-sm-2 col-xs-3 select-device <?php if($_GET['gadget'] == $row2->category_id ) echo "active-me" ?>"  >
                            <img class="img-responsive"   src="assets/img/category/<?php echo $row2->image; ?>" responsive><!--<i class="fa fa-mobile fa-4x fa-lg" aria-hidden="true"></i>--></a>
                      <?php } ?>
                    </center>
                  </div>
              </div>
          </div>
      </div>
  <div class="row">
      <div class="col-sm-10 col-sm-offset-1">

          <!--Start of the panel -->

          <div class="panel">

              <div class="panel-body"><!--Panel Content-->

                  <!-- thumbnail-->

                  <div id="device-s" class="row">

                      <?php

                      $db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);

                      $sql = "SELECT * FROM devices WHERE category_id = $category1";

                      $result = $db->query($sql);

                      while($row = $result->fetch_object()){

                          ?>

                      <div class="col-xs-6 col-sm-3 col-md-2 padding0lr">
                          <a href="select_model.php?id=<?php echo $row->device_id; ?>" class="thumbnail padding0" style="max-height:110px; min-height:110px; display: flex; align-items: center">
                              <img style="max-height:100px; display: block; height: auto;"  src="assets/img/devices/<?php echo $row->image; ?>" alt="<?php echo $row->device_name; ?>"  responsive>
                          </a>
                      </div>

                      <?php

                      }

                      ?>

                  </div>

                  <!--end of thumbnail-->

              </div>

          </div><!-- End of the panel -->

      </div>
  </div>
</div>

<?php

include 'footer.php';

?>
