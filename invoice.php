<?php include('header1.php');
require 'assets/config.php';
?>
    <div class="row new-row">
        <div class="col-md-12">
            <div class="container">
                <div class="page-header">
                    <h2><strong>Invoice</strong> </h2></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="col-sm-4 col-xs-6">
                    <h3><strong><?= $_SESSION['login_user']; ?></strong></h3>
                    <p><strong><?= $_SESSION['number']; ?></strong></p>
                    <p><?php
                    if( $_SESSION['addr1'])
                    {
                      echo $_SESSION['addr1'];
                    }
                    else{
                      echo $_SESSION['loc'].",&nbsp;";
                      echo $_SESSION['address'];
                    } ?></p>
                    <p>Date:&nbsp;<?= date('d-m-Y') ?> </p>
                </div>
                <div class="col-sm-8 col-xs-6">
                    <div class="row">
                        <div class="col-md-6 col-sm-6"><img class="img-responsive" alt="Barcode"></div>
                        <div class="col-md-6 col-sm-6"><img class="img-responsive" src="assets/img/compress_LOGO3.png" width="200px"></div>
                    </div>
                    <div class="row" style="padding-top:40px">
                        <div class="col-xs-12">
                            <p class="text-center"><strong>Device:&nbsp;</strong><?= $_SESSION['device_name'] ?>&nbsp;<?= $_SESSION['model_name'] ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="col-sm-12">
                    <form class="form-horizontal" action="order_confirmation.php" method="post">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="info">
                                        <th>Service </th>
                                        <th>Basic Price</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $dbc = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
                                  $totalbase=0;
                                  $productinfo=" ";
                                  foreach ($_SESSION['services'] as $key => $value) {
                                    # code...
                                    $sql1 = "SELECT service_name FROM services WHERE service_id=$value";
                                $result1 = $dbc->query($sql1);
                                $row = $result1->fetch_object();
                                $service = $row->service_name;
                                $productinfo = $productinfo." + ".$row->service_name;
                                $sql ="SELECT price from price WHERE service_id=? AND model_id=?";
                                if($stmt112 = $dbc->prepare($sql))
                                {
                                  $stmt112->bind_param('ii',$value,$_SESSION['model']);
                                  $stmt112->execute();
                                  $stmt112->bind_result($price);
                                  $stmt112->store_result();

                                      while ($stmt112->fetch()) {
                                        $totalbase+=$price;
                                        echo "<tr>
                                            <td>".$service."</td>
                                            <td>".$price."</td>

                                        </tr>";
                                      }
                                      $_SESSION['totalbase']=$totalbase;
                                      $stmt112->close();
                                    }
                                  }
                                   ?>
                                    <!--<tr class="warning">
                                        <td colspan="1"><em>Total Basic price &amp; Additional cost</em></td>
                                        <td><?=$_SESSION['totalbase']?></td>

                                    </tr>-->
                                   <!-- <tr class="success">
                                        <td colspan="2"><em>Discount</em> </td>
                                        <td colspan="1">Text</td>
                                    </tr>-->
                                    <tr class="info">
                                        <td class="info" colspan="1"><strong>Total</strong> </td>
                                        <td colspan="1"><?=$_SESSION['totalbase']?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                              <center>
                                <button class="btn btn-blue" type="submit">Confirm</button>
                              </center>
                                <p> </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php');?>
