<?php
require 'assets/config.php';
$db = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE)
OR die("Could not connect to MySQL". mysqli_connect_error());
include "header1.php";
if(isset($_SESSION['login_user']))
{$name = $_SESSION['login_user'];
$email = $_SESSION['email'];
$number = $_SESSION['number'];
$id = $_SESSION['user_id'];
$total = 0;
$sql = "SELECT * FROM users WHERE user_id=$id";
$result = $db->query($sql);
$row=$result->fetch_object();
}
?>
    <div class="container new-row">
        <div class="col-md-3 col-sm-6">
            <div class="thumbnail"><img class="img-circle" src="assets/user_img/nouser.png" width="200px">
                <div class="caption">
                    <h3><?php echo $name; ?></h3>
                    <p><?php echo $email; ?></p>
                    <p><?php echo $number; ?>
                        <?php if($row->verify != 'yes'){
                            echo "<a href='otp1.php'>Verify</a>";
                        } ?>
                    </p>

                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-6">
          <div class="row">
            <div class="col-xs-12">
              <ul class="nav nav-tabs nav-justified" role="tablist">
                  <li class="active"><a href="#active_order"role="tab" data-toggle="tab">Active Order</a></li>
                  <li><a href="#history" role="tab" data-toggle="tab">History </a></li>
              </ul>
            </div>
            <div class="col-xs-12">
              <div class="tab-content">
                <div class="tab-pane active" id="active_order">
                  <div class="col-md-12">
                      <?php
                        $sql1="SELECT status FROM activities WHERE user=$id";
                        $result1 = $db->query($sql1);
                        $row1 = $result1->fetch_object();
                      ?>
                    <div class="table-responsive">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ORDER ID</th>
                                    <th>DEVICE</th>
                                    <th>MODEL</th>
                                    <th>REPORT VIEW</th>
                                    <th>DETAILS</th>
                                    <th>STATUS IMAGE</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql4 = "SELECT * FROM activities WHERE user=$id AND status!='Delivered' AND status!='cancelled' GROUP BY order_id";

                            $result4 = $db->query($sql4);
                            while($row4 = $result4->fetch_object()){
                                //below code for device,service and status name

                                //device
                                $s = "SELECT * FROM devices WHERE device_id=$row4->device";
                                $result_d = $db->query($s);
                                $row_d = $result_d->fetch_object();
                                $device = $row_d->device_name;
                                //model
                                $s1 = "SELECT * FROM models WHERE model_id=$row4->model";
                                $result_m = $db->query($s1);
                                $row_m = $result_m->fetch_object();
                                $model = $row_m->model_name;
                                //service
                                $s2 = "SELECT * FROM services WHERE service_id=$row4->service";
                                $result_s = $db->query($s2);
                                $row_s = $result_s->fetch_object();
                                $service = $row_s->service_name;

                                //end of the code
                            ?>

                                <tr>
                                    <td><?= $row4->order_id ?></td>
                                    <td><?php echo $device; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><a href="report.php?q=<?php echo $row4->order_id; ?>">View QC Report</a></td>
                                    <td>
                                      <form action="user_detail.php" method="post">
                                        <input type="hidden" name="id" value="<?= $row4->user ?>"/>
                                        <input type="hidden" name="model" value="<?= $row4->model ?>"/>
                                        <input type="hidden" name="order" value="<?= $row4->order_id ?>"/>
                                      <button class="btn btn-info" type="submit">Details </button>
                                      </form>
                                    </td>
                                    <td>
                                        <a href="picture.php?q=<?php echo $row4->order_id; ?>">View</a>
                                    </td>
                                </tr>
                              <?php } ?>

                            </tbody>
                        </table>



                    </div>
                </div>
                </div>
                <div class="tab-pane" id="history">
                  <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>


                                <tr>
                                    <th>ORDER ID</th>
                                    <th>DEVICE</th>
                                    <th>MODEL</th>
                                    <th>DETAILS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql4 = "SELECT * FROM activities WHERE user=$id AND (status='Delivered' OR status='cancelled') GROUP BY order_id";

                            $result4 = $db->query($sql4);
                            while($row4 = $result4->fetch_object()){
                                //below code for device,service and status name

                                //device
                                $s = "SELECT * FROM devices WHERE device_id=$row4->device";
                                $result_d = $db->query($s);
                                $row_d = $result_d->fetch_object();
                                $device = $row_d->device_name;
                                //model
                                $s1 = "SELECT * FROM models WHERE model_id=$row4->model";
                                $result_m = $db->query($s1);
                                $row_m = $result_m->fetch_object();
                                $model = $row_m->model_name;
                                //service
                                $s2 = "SELECT * FROM services WHERE service_id=$row4->service";
                                $result_s = $db->query($s2);
                                $row_s = $result_s->fetch_object();
                                $service = $row_s->service_name;

                                //end of the code
                            ?>

                                <tr>
                                    <td><?= $row4->order_id ?></td>
                                    <td><?php echo $device; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td>
                                    <form action="user_detail.php" method="post">
                                        <input type="hidden" name="id" value="<?= $row4->user ?>"/>
                                        <input type="hidden" name="model" value="<?= $row4->model ?>"/>
                                        <input type="hidden" name="order" value="<?= $row4->order_id ?>"/>
                                        <input type="hidden" name="cancel" value="true"/>
                                      <button class="btn btn-info" type="submit">Details </button>
                                      </form>
                                      </td>
                                </tr>
                              <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
<?php
	include "footer.php";
?>

<!-- cancellation modal view-->
<div id="cancelModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-sm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to cancel the order ?</p>
                <a href="cancel.php" class="btn btn-info" role="button">Yes</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>

    </div>
</div>
<!--end of modal view-->
