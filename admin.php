<?php
ob_start();
require 'assets/config.php';
$db = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE)
OR die("Could not connect to MySQL". mysqli_connect_error());
include("header1.php");
include("assets/setinfo/modalviews.php");
if(isset($_SESSION['location']) && $_SESSION['location'] == "admin")
{
?>
    <div class="row new-row">
        <div class="col-md-12 col-sm-12">
            <div class="container">
                <div class="page-header margin-0-tb">
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
        <div class="col-sm-2 collapse navbar-collapse " id="toogleme-1" role="tablist">
            <ul class="list-group shadow-left">
                <li class="active"><a href="#users" role="tab" data-toggle="tab" class="list-group-item" ><span class="glyphicon glyphicon-user"></span> Users </a></li>
                <li class=""><a href="#category" role="tab" data-toggle="tab" class="list-group-item" ><span class="glyphicon glyphicon-th-large"></span> Add category </a></li>
                <li class=""><a href="#devices" role="tab" data-toggle="tab" class="list-group-item"><span class="glyphicon glyphicon-phone"></span> Devices </a></li>
                <li class=""><a href="#models" role="tab" data-toggle="tab" class="list-group-item"><span class="glyphicon glyphicon-compressed"></span> Models </a></li>
                <li class=""><a href="#services" role="tab" data-toggle="tab" class="list-group-item"><span class="glyphicon glyphicon-wrench"></span> Services </a></li>
                <li class=""><a href="#activitys" role="tab" data-toggle="tab" class="list-group-item"><span class="glyphicon glyphicon-flash"></span> User Activity</a></li>
                <li class=""><a href="#locations" role="tab" data-toggle="tab" class="list-group-item"><span class="glyphicon glyphicon-globe"></span> Add Location</a></li>
                <li class=""><a href="#price" role="tab" data-toggle="tab" class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Service and Prices</a></li>
            </ul>
        </div>

        <div class="col-sm-9 col-md-10  tab-content shadow-left">
            <div class="row tab-pane fade in active"  id="users">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>

                                <tr>
                                    <th> <a href="#" data-toggle="modal" data-target="#userModal">ADD </a></th>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>Phone Number</th>
                                    <th>Email </th>
									<th>Type </th>
                                    <th>is Active</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //code for fetching data from users
							$sql = "SELECT * FROM users";
                            $result = $db->query($sql);
                            while($row = $result->fetch_object()){


                            ?>
                                <tr>
                                    <td><form action="assets/deleteinfo/edit.php" method="post">
                                            <input type="submit" value="Delete" >
                                            <input type="hidden" name="id" value="<?php echo $row->user_id; ?>">
                                        </form></td>
                                    <td><?php echo $row->user_id; ?></td>
                                    <td><?php echo $row->user_name; ?></td>
                                    <td><?php echo $row->user_phone; ?></td>
                                    <td><?php echo $row->user_email; ?></td>
                                    <td>dev</td>
                                    <td>active</td>
                                </tr>
                                    <?php }  //END OF CODE ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row tab-pane fade" id="devices">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> <form action="#" method="post">
                                            <input type="button" name="submit1" value="ADD" data-toggle="modal" data-target="#deviceModal">
                                        </form> </th>
                                    <th>Device ID</th>
                                    <th>Device Name</th>
                                    <th>Category </th>
                                    <th>image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    //CODE TO FETCH THE DATA FROM DEVICES TABLE
                                    $sql1 = "SELECT d.device_id, d.device_name,c.category_name,d.image FROM devices d INNER JOIN category c ON d.category_id = c.category_id";
                                    $result1 = $db->prepare($sql1);
                                    $result1->execute();
                                    $result1->bind_result($device_id,$device_name,$category_name,$image);
                                    $result1->store_result();
                                    while($row1 = $result1->fetch()){


                                    ?>
                                    <td><form action="assets/deleteinfo/delete_device.php" method="post">
                                            <input type="submit" value="Delete" name="device">
                                            <input type="hidden" name="device_id" value="<?php echo $device_id; ?>">
                                        </form></td>
                                    <td><?php echo $device_id; ?></td>
                                    <td><?php echo $device_name; ?></td>
                                    <td><?php echo $category_name; ?></td>
                                    <td><img src="assets/img/devices/<?php echo $image; ?>" alt="Smiley face" height="50" width="50"></td>
                                </tr>
                            <?php } // END OF CODE?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row tab-pane fade" id="models">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> <form action="#" method="post">
                                            <input type="button" name="submit1" value="ADD" data-toggle="modal" data-target="#modelModal">
                                        </form> </th>
                                    <th>Model ID</th>
                                    <th>Model name</th>
                                    <th>Device </th>
                                    <th>Image </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //CODE TO FETCH DEVICE AND MODELS DETAILS BY INNER JOIN
                            $sql2 = "SELECT * FROM models INNER JOIN devices ON models.device = devices.device_id";
                            $result2 = $db->query($sql2);
                            while($row2 = $result2->fetch_object()){


                            ?>
                                <tr>
                                    <td><form action="assets/deleteinfo/delete_model.php" method="post">
                                            <input type="submit" value="Delete">
                                            <input type="hidden" name="model_id" value="<?php echo $row2->model_id; ?>">

                                        </form></td>
                                    <td><?php echo $row2->model_id; ?></td>
                                    <td><?php echo $row2->model_name; ?></td>
                                    <td><?php echo $row2->device_name; ?></td>
                                    <td><img src="assets/img/model/<?php echo $row2->image_m; ?>" alt="Smiley face" height="50" width="50"></td>
                                </tr>
                            <?php }
                            // END OF CODE
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row tab-pane fade" id="services">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> <form action="#" method="post">
                                            <input type="button" name="submit1" value="ADD" data-toggle="modal" data-target="#serviceModal">


                                        </form></th>
                                    <th>Service ID</th>
                                    <th>Service </th>
                                    <th>Category </th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //CODE FOR FETCHING DATA FROM  SERVICES AND MODELS TABLE BY INNER JOIN
                            $sql3 = "SELECT * FROM services INNER JOIN category ON services.category_id = category.category_id";
                            $result3 = $db->query($sql3);
                            while($row3 = $result3->fetch_object()) {

                                ?>
                                <tr>
                                    <td>
                                        <form action="assets/deleteinfo/delete_service.php" method="post">
                                            <input type="submit" value="Delete">
                                            <input type="hidden" name="service_id" value="<?php echo $row3->service_id; ?>">

                                        </form>
                                    </td>
                                    <td><?php echo $row3->service_id; ?></td>
                                    <td><?php echo $row3->service_name; ?></td>
                                    <td><?php echo $row3->category_name; ?></td>
                                    <td><img src="assets/img/services/<?php echo $row3->image_s; ?>" alt="Smiley face" height="50" width="50"></td>
                                </tr>
                                <?php
                            }
                            //END OF CODE
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row tab-pane fade" id="activitys">
                <div class="col-md-12">
                <a class="btn btn-info" target="_blank" href="order_cancel.php">Cancelled order </a>
                <a class="btn btn-info" href="admin.php?groupuser=true">Group user </a>
                <a class="btn btn-info" href="admin.php">All orders </a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="#"> </a>
                                    </th>
                                    <th>User </th>
                                    <th>Status</th>
                                    <th>Device</th>
                                    <th>Model</th>
                                    <th>Payed</th>

                                    <th>Pickup date</th>
                                    <th>Pickup time</th>
                                    <th>Pick up Location</th>
                                    <th>Drop-off Address</th>
                                    <th>Requested Store</th>


                                    <th>Phone number</th>
                                    <th>Email Address</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //GET DATA FROM THE activities TABLE
                            $sql4 = "SELECT * FROM activities WHERE status!='cancelled' GROUP BY order_id ORDER BY barcode DESC";
                            if(isset($_GET['groupuser']))
                            {
                              $sql4 = "SELECT * FROM activities WHERE status!='cancelled' GROUP BY user ORDER BY barcode DESC";
                            }

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

                                    <td><a class="btn btn-info" target="_blank" href="
                                      <?php if(isset($_GET['groupuser']))
                                      {
                                        echo "detail_models.php?device=".$row4->device."&id=".$row4->user."&model=". $row4->model ;
                                      }
                                      else{
                                          echo "details.php?device=".$row4->device."&model=".$row4->model."&user=".$row4->user."&order=".$row4->order_id ;
                                      }
                                      ?>
                                      ">Details </a>

                                    </td>
                                    <td><?php echo $user; ?></td>
                                    <td><?php echo $row4->status; ?></td>
                                    <td><?php echo $device; ?></td>
                                    <td><?php echo $model; ?></td>
                                    <td><?= $row4->payment_type ?></td>

                                    <td><?php echo $row4->booking_date; ?></td>
                                    <td><?php echo $row4->pickup_time; ?></td>
                                    <td><?php echo $row4->pickup_location; ?></td>
                                    <td><?php echo $row4->dropoff_location; ?></td>
                                    <td><?php echo $row4->address."<br>".$row4->location ."<br>".$row4->city;  ?></td>


                                    <td><?php echo $row4->phone; ?></td>
                                    <td><?php echo $row4->email; ?></td>

                                </tr>
                            <?php }
                            //CODE ENDS HERE ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row tab-pane fade" id="category">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> <form action="#" method="post">
                                        <input type="button" name="submit1" value="ADD" data-toggle="modal" data-target="#catModal">
                                    </form> </th>
                                <th>Category ID</th>
                                <th>Category Name</th>
                                <th>Image </th>
                            </tr>
                            </thead>
                              <tbody>
                              <?php
                              $sql_ = "SELECT * FROM category";
                              $result212 = $db->query($sql_);
                              while($row212 = $result212->fetch_object()){
                                  ?>
                                  <tr>
                                      <td>
                                          <form action="assets/deleteinfo/delete_cat.php" method="post">
                                              <input type="submit" value="Delete">
                                              <input type="hidden" name="category_id" value="<?php echo $row212->category_id; ?>">
                                          </form>
                                      </td>
                                      <td><?php echo $row212->category_id; ?></td>
                                      <td><?php echo $row212->category_name; ?></td>
                                      <td><img src="assets/img/category/<?php echo $row212->image; ?>" alt="Smiley face" height="50" width="50"></td>
                                  </tr>
                              <?php } // END OF CODE?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row tab-pane fade" id="locations">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> <form action="#" method="post">
                                        <input type="button" name="submit1" value="ADD" data-toggle="modal" data-target="#locationModal">
                                    </form> </th>
                                <th>Location ID</th>
                                <th>Location</th>
                                <th>City </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                //CODE TO FETCH THE DATA FROM DEVICES TABLE
                                $sql1 = "SELECT * FROM location";
                                $result1 = $db->query($sql1);
                                while($row1 = $result1->fetch_object()){


                                ?>
                                <td><form action="assets/deleteinfo/delete_city.php" method="post">
                                        <input type="submit" value="Delete" name="device">
                                        <input type="hidden" name="location_id" value="<?php echo $row1->location_id; ?>">
                                    </form></td>
                                <td><?php echo $row1->location_id; ?></td>
                                <td><?php echo $row1->location_name; ?></td>
                                <td><?php echo $row1->city_name; ?></td>
                            </tr>
                            <?php } // END OF CODE?>
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
include('footer.php');
?>
</body>
</html>
