<?php
require 'config.php';
include 'header1.php';
$id = $_SESSION['device'] = $_GET['id'];
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$sql1 = "SELECT * FROM devices WHERE device_id=$id";
$result1=$db->query($sql1);
$row1 = $result1->fetch_object();
$_SESSION['device_name'] = $device_name = $row1->device_name;
?>

<div class="row" style="margin-top: 60px;">
  <div class="container-fluid">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="page-header">
          <h2>Service Model</h2></div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
        <!--Start of the panel -->
        <div class="new-panel ">
            <div class="panel-heading"><center><b style="font-family: Slant; font-size: 2.3em; color: #87add1"><?php echo strtoupper($device_name); ?></b></center></div>
            <div class="panel-body"><!--Panel Content-->
                <!-- thumbnail-->
                <div class="row">
                    <?php
                    $db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
                    $sql = "SELECT * FROM models WHERE device=$id";
                    $result = $db->query($sql);
                    while($row = $result->fetch_object()){

                        ?>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <a href="select_service.php?id=<?php echo $row->model_id; ?>" class="thumbnail select-models">
                                <img src="assets/img/model/<?php echo $row->image_m; ?>" alt="<?php echo $row->image_m; ?>" responsive>
                                <div class="caption select-models-text text-nowrap"><b><?php echo $row->model_name; ?></b></div>
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
include "footer.php";
?>
