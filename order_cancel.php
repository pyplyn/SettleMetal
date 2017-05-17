<?php
require 'assets/config.php';
$db = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE)
OR die("Could not connect to MySQL". mysqli_connect_error());
include "header1.php";
?>
    <div class="table-responsive" style="margin:50px;">
        <table class="table">
            <thead>
            <tr>
                <th>
                    <a href="#"> </a>
                </th>
                <th>User </th>

                <th>Payment type</th>

                <th>Pickup date</th>
                <th>Pickup time</th>
                <th>Pick up Location</th>
                <th>Requested Store</th>


                <th>Customer phone number</th>
                <th>Email Address</th>
                <th>Drop-off Address</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //GET DATA FROM THE activities TABLE
            $sql4 = "SELECT * FROM activities WHERE status='cancelled' GROUP BY user";

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

                <tr>

                    <td><a class="btn btn-info" target="_blank" href="detail_models.php?id=<?php echo $row4->user ?>&model=<?php echo $row4->model; ?>&det=false">Details </a>

                    </td>
                    <td><?php echo $user; ?></td>

                    <td><?php $row4->payment_type ?></td>

                    <td><?php echo $row4->booking_date; ?></td>
                    <td><?php echo $row4->pickup_time; ?></td>
                    <td><?php echo $row4->pickup_location; ?></td>
                    <td><?php echo $row4->address."<br>".$row4->location ."<br>".$row4->city;  ?></td>


                    <td><?php echo $row4->phone; ?></td>
                    <td><?php echo $row4->email; ?></td>
                    <td><?php echo $row4->dropoff_location; ?></td>
                </tr>
            <?php }
            //CODE ENDS HERE ?>
            </tbody>
        </table>
    </div>

<?php
include "footer.php";
?>