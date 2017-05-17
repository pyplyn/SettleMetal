<script>

    //for toggle
    function same_address1()
    {
        var x= document.getElementById("address");
        var y= document.getElementById("address1");
        if(x.hasAttribute("hidden"))
        {
            x.removeAttribute("hidden");
            y.setAttribute("hidden","");
        }
        else
        {
            x.value="";
            x.setAttribute("hidden","");
        }
    }

    function same_address2()
    {
        var x= document.getElementById("address1");
        var y= document.getElementById("address");
        if(x.hasAttribute("hidden"))
        {
            x.removeAttribute("hidden");
            y.setAttribute("hidden","");
        }
        else
        {
            x.value="";
            x.setAttribute("hidden","");
        }
    }
    //end of toggle code
    function getInfo() {

        var str = document.getElementById("myLocation").value;
        var pross= document.getElementById("pross");
        pross.removeAttribute("hidden");
        if (str == "") {
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("myAddress").innerHTML = this.responseText;
                    pross.setAttribute("hidden"," ");
                }
            };
            xmlhttp.open("GET", "getAddress.php?city='" + str + "'", true);

            xmlhttp.send();
        }
    }

    function same_address()
{
    var x= document.getElementById("address_alt");
    if(x.hasAttribute("readonly"))
    {
        x.removeAttribute("readonly");
    }
    else
    {
        x.value="";
        x.setAttribute("readonly","");
    }
}
</script>

<?php


$cr_date= date('d-m-Y',strtotime(date('d-m-Y').' +1 day'));
$nxt_date=date('d-m-Y',strtotime(date('d-m-Y').' +2 day'));

require 'config.php';?>
<?php include("header1.php");

$city = $_SESSION['city'];

?>
<script>
    $(document).ready(function(){
        $('#first').on('change',function (){
            ('#one').hide();
        });

        });
    })
</script>

<style>
    .row.vdivide [class*='col-']:not(:last-child):after {
        background: #e0e0e0;
        width: 1px;
        content: "";
        display:block;
        position: absolute;
        top:0;
        bottom: 0;
        right: 0;
        min-height: 70px;
    }
</style>
    <div class="container">
        <div class="row new-row">
            <div class="col-md-6">
                <div class="page-header">
                    <h2>Service List</h2></div>
            </div>
            <div class="col-md-6" style="margin-top:20px">
                <blockquote>
                  <?php
                  $dbc = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
                    # code...
                    $sql = "SELECT d.device_name, m.model_name FROM devices d INNER JOIN models m ON m.device=d.device_id where m.model_id=? ";
                    if($stmt111 = $dbc->prepare($sql))
                    {
                      $stmt111->bind_param('i',$_SESSION['model']);
                      $stmt111->execute();
                      $stmt111->bind_result($device,$model);
                      $stmt111->store_result();

                      while ($stmt111->fetch()) {
                        echo "<p>".$device."</p>
                              <footer>".$model."</footer>";
                              $_SESSION['device_name']=$device;
                              $_SESSION['model_name']=$model;
                      }
                      $stmt111->close();
                    }
                   ?>

                </blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">

                    <div class="row table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="info">
                                    <th> </th>
                                    <th>Service</th>
                                    <th>Basic Price</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $dbc = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
                              $totalbase=0;
                              foreach ($_SESSION['services'] as $key => $value) {
                                # code...
                              	$sql1 = "SELECT service_name FROM services WHERE service_id=$value";
                              	$result1 = $dbc->query($sql1);
                              	$row = $result1->fetch_object();
                              	$service = $row->service_name;

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
                                        <td class='danger'>
                                            <a href='assets/validation/remove_cart.php?q=".$key."' aria-label='close' class='close'><span aria-hidden='true'>×</span></a>
                                        </td>
                                        <td>".$service."</td>
                                        <td>".$price."</td>

                                    </tr>";
                                  }
                                  $_SESSION['totalbase']=$totalbase;
                                  $stmt112->close();
                                }

                              }
                               ?>

                               <!-- <tr>
                                    <td class="danger">
                                        <button aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                    </td>
                                    <td>services </td>
                                    <td>basic price</td>
                                    <td>add price<td>
                                </tr>-->
                                <!--<tr class="warning">
                                    <td colspan="2"><em>Total Basic price &amp; Additional cost</em></td>
                                    <td><?=$_SESSION['totalbase']?></td>
                                    <td>Total add</td>









                                </tr>--><!--
                                <tr class="success">
                                    <td colspan="3"><em>Discount</em> </td>
                                    <td colspan="2">Discount price</td>
                                </tr>-->
                                <tr class="info">
                                    <td class="info" colspan="2"><strong>Total</strong> </td>
                                    <td colspan="1"><?=$_SESSION['totalbase']?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="padding-left: 0px;">
                          <span style="color:#fb6d69; font-size: 17px"><b>
                            <p>Note:</p>
                            <ul style="padding-left: 20px;">
                              <li>The price shown above is an estimated price.</li>
                              <li>The final price will be reflected in your profile after the diagnosis.</li>
                              <li>Please take backup of your data.</li>
                              <li>Settlemetal will not take responsibility of the data if lost.</li>
                            </ul>
                            </b>
                          </span>
                        </div>
                    </div>

            </div>
            <form action="assets/getinfo/otherInfo.php" method="post">
            <div class="col-sm-6">

                    <?php if(isset($_GET['addr'])){
                        echo '<div class="alert alert-danger">Please enter the complete address.</div>';
                    }if(isset($_GET['date'])){
                        echo '<div class="alert alert-danger">Please give a valid date.</div>';
                    }
                    if(isset($_GET['time'])){
                        echo '<div class="alert alert-danger">Please give a valid time.</div>';
                    }
                     ?>

                <div class="form-group">
                  <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-info active">
                    <input type="radio" name="pick_drop" id="option1" value="pdf" onchange="same_address1()" checked >Pick up and drop off
                  </label>
                  <label class="btn btn-info">
                    <input type="radio" name="pick_drop" id="option2" value="df" onchange="same_address2()"> Drop off your device at one of our partner store
                  </label>
                </div>
              </div>
                <div id="address">
                <div class="form-group">

                <label class="control-label">Pick-up & Drop-off Address </label>
                <input class="form-control input-lg" name="addr1" type="text" >
                </div>
                <div class="form-group"><!-- same address -->
                <label class="control-label">Alternate Drop-off Address:(optional) </label>
                  <div class="input-group">
                    <div class="input-group-addon"><input type="checkbox" onChange="same_address()"></div>
                    <input id="address_alt" name="addr2" class="form-control input-lg" type="text" placeholder="Address" readonly>
                  </div>
                </div>
                </div>
                <div id="address1" hidden>
                <div class="form-group">
                    <label class="control-label">Location:</label>
                    <select class="form-control input-lg" id="myLocation" name="location" onchange="getInfo()">
                        <option value="">--Select--</option>
                        <?php
                        $sql1 = "SELECT location_name FROM location WHERE city_name='$city'";
                        $result = $dbc->query($sql1);
                        while($row = $result->fetch_object()){
                            echo "<option value='".$row->location_name."' >".$row->location_name."</option>";
                        }


                        ?>
                    </select>
                    <div class="progress" id="pross" style="border-radius: 0px" hidden>
                      <div class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">

                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Store Address:</label>
                    <select class="form-control input-lg" id="myAddress" name="address">

                    </select>
                </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Pickup Date </label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-info"><input type="radio" name="pdate" id="option2" checked value="<?= $cr_date; ?>"><?= $cr_date; ?></label>
                        <label class="btn btn-info"><input type="radio" name="pdate" id="option3"  value="<?= $nxt_date; ?>" > <?= $nxt_date; ?></label>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label">Pickup Time </label>
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-info"><input type="radio" name="ptime" id="option1" value="9-11:59AM" checked>9-11:59AM</label>
                        <label class="btn btn-info"><input type="radio" name="ptime" id="option2" value="11AM-1:00PM" > 11AM-1:00PM</label>
                        <label class="btn btn-info"><input type="radio" name="ptime" id="option3" value="2-4:00PM" > 2-4:00PM</label>
                        <label class="btn btn-info"><input type="radio" name="ptime" id="option4" value="4-6:00PM" > 4-6:00PM</label>
                    </div>
                </div>
                <div class="form-group">
                    <center><button class="btn btn-blue shadow-left" type="submit">Next  </button></center>
                </div>
            </form>

            </div>


        </div>

            </form>
    </div>
<?php include("footer.php") ?>
