

<?php
$device_id=$_GET['device'];
$user_id = $_GET['user'];
$model_id = $_GET['model'];
$order_id = $_GET['order'];
include 'header1.php';
require 'config.php';
$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$sql = "SELECT * FROM activities WHERE user=$user_id and order_id=$order_id ";
$result = $db->query($sql);
$status = $result->fetch_object();
$order = $status->order_id;
$payed =$status->transaction_id;
$paytype=$status->payment_type;
$total = 0;

$s0 = "SELECT * FROM users WHERE user_id=$user_id";
$result_u = $db->query($s0);
$row_u = $result_u->fetch_object();
$user = $row_u->user_name;
$s = "SELECT * FROM devices WHERE device_id=$device_id";
$result_d = $db->query($s);
$row_d = $result_d->fetch_object();
$device = $row_d->device_name;
$s1 = "SELECT * FROM models WHERE model_id=$model_id";
$result_d1 = $db->query($s1);
$row_d1 = $result_d1->fetch_object();
$model_name = $row_d1->model_name;
?>







<div class="container" style="margin:55px;">
    <!-- Data fetching code-->
    <div class="col-xs-12">
    <h3>Status:<font color="red"><?php
    if($status->status == "Payment awaited")
      {if($payed==null){
        echo $status->status;
      }
      else {
        echo " Payed";
      }
    }
    else {
      echo $status->status;
    } ?></font></h3>
  </div>
    <div class="col-xs-12">
      <ul class="nav nav-pills nav-stacked">
        <li class="active ">
          <a class="list-group-item">
          <span class="badge pull-left">User: <?= $user ?></span>
          <span class="badge pull-left">Device: <?= $device ?></span>
          <span class="badge pull-left">Model: <?= $model_name ?></span>
           <?php if($payed!= null) {
            ?><span class="badge pull-left">Payment: <?= $paytype ?></span>
              <?php
          }else {
            echo "<span class='badge pull-left'>Payment: NA</span>";
          }?>
          &nbsp;
          </a>
        </li>
      </ul>
    </div>
    <div class="col-xs-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Service Name</th>
                <th>Price</th>
                <th>Additional cost</th>
                <th>Action</th>
                <th>Problems</th>
            </tr>
            </thead>
            <tbody>

<?php
    $sql4 = "SELECT * FROM activities WHERE order_id=$order_id and user=$user_id AND status!='Delivered'";

    $result4 = $db->query($sql4);
    while($row4 = $result4->fetch_object()) {

        //service
        $s2 = "SELECT * FROM services WHERE service_id=$row4->service";
        $result_s = $db->query($s2);
        $row_s = $result_s->fetch_object();
        $service = $row_s->service_name;
        //end of the code
        ?>

                <tr><form action="update_price.php?id=<?php echo $row4->barcode; ?>" method="post">
                    <td><?php echo $service; ?></td>
                    <td><input type="text" value="<?php echo $row4->price;$total += $row4->price + $row4->updated_price; ?>" name="price"></td>
                    <td><input type="text" value="<?php echo $row4->updated_price; ?>" name="update_price"></td>
                    <td><button type="submit" class="btn btn-info" role="button">Update Price</button></td>
                    <td><?php echo $row4->other_service; ?></td>
                    </form>
                <tr>
        <?php
    }
    ?>
                  <tr>
                  <td colspan="" style="text-align:right"> <b>Total</b></td>
                  <td colspan="2" style="text-align:center"> <b><?php echo $total; ?></b></td>
                  <td > <b></b></td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="col-xs-12">
    <form action="change_status.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $user_id; ?>"/>
      <input type="hidden" name="model" value="<?php echo $model_id; ?>"/>
      <input type="hidden" name="device" value="<?php echo $device_id; ?>"/>
      <input type="hidden" name="order" value="<?php echo $order_id; ?>"/>

    <!-- End of the code -->

        <!-- for image --><?php
        $sql41 = "SELECT * FROM activities WHERE user=$user_id ";

        $result41 = $db->query($sql41);
        $row41 = $result41->fetch_object();
        ?>
        <!-- end of the code -->
        <label class="control-label">Device status:</label>
        <select name="status">
            <option value="Picked Up">Picked Up</option>
            <option value="Received">Received</option>
            <option value="Pre-Diagnosis">Pre-Diagnosis</option>
            <option value="Payment awaited">Payment awaited</option>
            <option value="Repairing">Repairing</option>
            <option value="Post Diagnosis">Post Diagnosis</option>
            <option value="Repaired">Repaired</option>
            <option value="Out for delivery">Out for delivery</option>
            <option value="Delivered">Delivered</option>
            <option value="cancelled">Cancel</option>
        </select><br>
        <label class="control-label">Select image to upload: </label>
        <input class="form-control input-lg" type="file" name="fileToUpload" title=" ">
        <center><button class="btn btn-blue" type="submit">Update</button></center>
    </form>
    <a href="report_edit.php?q=<?php echo $order ?>">Update QC report</a>
  </div>
</div>
<?php
include 'footer.php';
?>
