<?php
$device_id=$_GET['device'];
$user_id = $_GET['id'];
$model_id = $_GET['model'];
include 'header1.php';
require 'config.php';
$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$sql = "SELECT * FROM activities WHERE user=$user_id ";
$result = $db->query($sql);
$status = $result->fetch_object();
$total = 0;

/*
 <ul class="list-group">
  <li class="list-group-item">First item</li>
  <li class="list-group-item">Second item</li>
  <li class="list-group-item">Third item</li>
</ul>
 */
?>







    <div class="container" style="margin:55px;">
        <!-- Data fetching code-->


        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Device</th>
                <th>Model</th>
                <th>Status</th>
                <th>Action</th>
                <th>Comments</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody>
            <!--data fetching-->
            <?php
            $sql4 = "SELECT * FROM activities WHERE user=$user_id GROUP BY order_id";

            $result4 = $db->query($sql4);
            while($row4 = $result4->fetch_object()){
            //below code for device,service and status name
            //user
            $s0 = "SELECT * FROM users WHERE user_id=$row4->user";
            $result_u = $db->query($s0);
            $row_u = $result_u->fetch_object();
            $user = $row_u->user_name;
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
            <!--end of the code-->
                <tr>
                    <td><?php echo $device;?></td>
                    <td><?php echo $model;?></td>
                    <td><?php echo $row4->status; ?></td>
                    <td><a class="btn btn-info" target="_blank" href="details.php?device=<?= $device_id ?>&model=<?php echo $row4->model; ?>&user=<?php echo $row4->user ?>&order=<?php echo $row4->order_id; ?>">VIEW </a></td>
                    <td><?php echo $row4->other_service; ?></td>
                    <td><img height="100px" width="100" src="assets/img/status/<?php echo $row4->image; ?>"></td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
<?php
include 'footer.php';
?>
