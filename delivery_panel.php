<?php
require 'assets/config.php';
$db = @mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE)
OR die("Could not connect to MySQL". mysqli_connect_error());
include("header.php");
include("assets/setinfo/modalviews.php");
?>
    <div class="row new-row">
        <div class="col-md-12 col-sm-12">
            <div class="container">
                <div class="page-header">
                    <h2>Status Panel | <small>.....</small></h2></div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 2%;">
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
                        <th>Booking date</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //GET DATA FROM THE activities TABLE
                    $sql4 = "SELECT * FROM activities";
                    $result4 = $db->query($sql4);
                    while($row4 = $result4->fetch_object()){


                        ?>
                        <tr>

                            <td><a id="target" data-toggle="modal" data-target="#activityModal" onclick="getValue(<?php echo $row4->barcode; ?>)">Edit </a>

                            </td>
                            <td><?php echo $row4->user; ?></td>
                            <td><?php echo $row4->device; ?></td>
                            <td><?php echo $row4->model; ?></td>
                            <td><?php echo $row4->service; ?></td>
                            <td><?php echo $row4->status; ?></td>
                            <td><?php echo $row4->pickup_date1 , "/" , $row4->pickup_date2; ?></td>
                            <td><?php echo $row4->pickup_time; ?></td>
                            <td><?php echo $row4->booking_date; ?></td>
                            <td><script>document.write(data);</script></td>
                        </tr>
                    <?php }
                    //CODE ENDS HERE ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>





<?php include("footer.php"); ?>