<?php
require 'assets/config.php';
$db = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE)
OR die("Could not connect to MySQL". mysqli_connect_error());
include("header1.php");
include("assets/setinfo/modalviews.php");
if(isset($_SESSION['location']) && $_SESSION['location'] == "deliv")
{
?>
    <div class="row new-row">
        <div class="col-md-12 col-sm-12">
            <div class="container">
                <div class="page-header">
                    <h2>Admin <small>Name of the admin</small></h2></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 container-fluid navbar-header">
            <button class="navbar-toogle btn btn-default btn-sm hidden visible-xs-block" type="button" data-toggle="collapse" data-target="#toogleme-1">
                <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-3 collapse navbar-collapse " id="toogleme-1" role="tablist">
            <ul class="list-group shadow-left">

                <li class="active"><a href="#activitys" role="tab" data-toggle="tab" class="list-group-item"><span class="glyphicon glyphicon-flash"></span> User Activity</a></li>

            </ul>
        </div>
        <div class="col-md-10 col-sm-9 tab-content shadow-left">
            <div class="row tab-pane fade in active" id="activitys">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="#"> </a>
                                    </th>
                                    <th>User </th>
                                    <th>Device </th>
                                    <th>Model </th>
                                    <th>Service </th>
                                    <th>status </th>
                                    <th>Pickup date</th>
                                    <th>Pickup time</th>
                                    <th>Pick up Location</th>
                                    <th>Requested Store</th>
                                    <th>Due Amount</th>
                                    <th>Customer email</th>
                                    <th>Customer phone number</th>
                                    <th>Drop-off Address</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //GET DATA FROM THE activities TABLE
                            $sql4 = "SELECT * FROM activities";

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

                                    <td><a id="target" data-toggle="modal" data-target="#activityModal" onclick="getValue(<?php echo $row4->barcode; ?>)">Edit </a>

                                    </td>
                                    <td><?php echo $row4->user; ?></td>
                                    <td><?php echo $device; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?php echo $service; ?></td>
                                    <td><?php echo $row4->status; ?></td>
                                    <td><?php echo $row4->booking_date; ?></td>
                                    <td><?php echo $row4->pickup_time; ?></td>
                                    <td><?php echo $row4->pickup_location; ?></td>
                                    <td><?php echo $row4->address."<br>".$row4->location ."<br>".$row4->city;  ?></td>
                                    <td><?php echo $row4->price; ?></td>
                                    <td><?php echo $row4->email; ?></td>
                                    <td><?php echo $row4->phone; ?></td>
                                    <td><?php echo $row4->dropoff_location; ?></td>
                                </tr>
                            <?php }
                            //CODE ENDS HERE ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- service and price-->
            <div class="row tab-pane fade" id="price">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> <form action="#" method="post">
                                            <input type="button" name="submit1" value="EDIT" data-toggle="modal" data-target="#serviceModal">


                                        </form></th>
                                    <th>Service </th>
                                    <th>Model </th>
                                    <th>Price </th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //CODE FOR FETCHING DATA FROM  SERVICES AND MODELS TABLE BY INNER JOIN
                            $sql3 = "SELECT * FROM price";
                            $result3 = $db->query($sql3);
                            while($row3 = $result3->fetch_object()) {

                                ?>
                                <tr>
                                    <td>
                                        <form action="assets/deleteinfo/delete_price.php" method="post">
                                            <input type="submit" value="Delete">
                                            <input type="hidden" name="price_id" value="<?php echo $row3->price_id; ?>">


                                        </form>
                                        <a id="target" data-toggle="modal" data-target="#priceModal" onclick="getID(<?php echo $row3->price_id; ?>)">Edit </a>
                                    </td>
                                    <td><?php //echo $row3->service_id;
                                    $sql11="SELECT service_name FROM services WHERE service_id=$row3->service_id";
                                    $result11 = $db->query($sql11);
                                    $row11 = $result11->fetch_object();
                                    echo $row11->service_name;
                                     ?></td>
                                    <td><?php //echo $row3->service_name;
                                    $sql12="SELECT model_name FROM models WHERE model_id=$row3->model_id";
                                    $result12 = $db->query($sql12);
                                    $row12 = $result12->fetch_object();
                                    echo $row12->model_name;
                                     ?></td>
                                    <td><?php echo $row3->price; ?></td>

                                <?php
                            }
                            //END OF CODE
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end -->
        </div>
    </div>
    <br>
<?php
}
else{
header('Location:a_login.php');

}
 include("footer.php"); ?>
