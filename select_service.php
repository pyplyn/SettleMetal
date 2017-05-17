<?php
require 'config.php';
include 'header1.php';
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$id = $_SESSION['model'] = $_GET['id'];
$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$sql1 = "SELECT * FROM models WHERE model_id=$id";
$result1 = $db->query($sql1);
$row1 = $result1->fetch_object();
$_SESSION['model_name'] = $model_name = $row1->model_name;
?>
<script>
var arr= new Array();
var tot=0;
function total(price, pid) {
    if(arr[pid]==undefined || arr[pid]==0)
      {
        arr[pid]=price;
        //alert(arr[pid]);
        tot +=price;
      }
      else{
        arr[pid]=0;
        tot -=price;
      //  alert("defined");
      }
    //  alert("total="+tot);
    document.getElementById("total").innerHTML=tot;
    document.getElementById("total2").innerHTML=tot;

}
</script>
<div style="background-color: #EAE7E7">
<div class="row" style="padding-top:60px">
    <div class="col-md-12">
      <form action="assets/validation/cart_session.php" method="post">
        <div class="row imargin-bottom">
          <div class="col-md-6 col-sm-12 hidden-xs hidden-sm ">
            <div class="row">
            <div id="affx" class="col-md-12 col-sm-12 select-srv-left paddinglf"  data-spy="affix" data-offset-top="0"  data-offset-bottom="230" >
                <div class="row imargin-bottom">
                    <div class="col-md-12">
                      <p></p>
                      <?php $db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
                      $sql = "SELECT image_m FROM models WHERE model_id=?";
                      $result=$db->prepare($sql);
                      $result->bind_param('i',$id);
                      $result->execute();
                      $result->bind_result($image);
                      $result->store_result();
                      $result->fetch()?>
                      <center><img id="srv_model_image" class="img-responsive" src="assets/img/model/<?php echo $image ?>"  responsive></center>
                    </div>
                </div>
                <div class="row">
                    <div id="srv-model_name" class="col-md-12">
                        <h2 class="text-nowrap text-center"><?php echo $model_name ?></h2></div>
                        <input type="text" value="<?php echo $id ?>" name="model_id" hidden=""/>
                </div>
                <div class="row">
                    <div id="srv-price" class="col-md-12">
                        <h3 class="text-center">Total Rs. <strong id="total">0</strong></h3></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <center><button id="service-req-btn" class="btn btn-danger btn-block btn-lg" type="submit"><img src="assets/img/services/btn-logo.png">&nbsp; Request A Repair </button></center>
                    </div >
                    <div class="col-md-12">
                      <p>
                      <center>
                      <span class="label label-danger"><?php if(isset($_GET['sv'])){
                        echo "No service selected";
                      } ?></span></center>
                      </p>
                      <center><b>State your problem:</b></center>
                      <center class="form-group"><textarea class="form-control" name="other1" rows="3" cols="5" style="margin-left:27px; width: 400px"></textarea></center>
                    </div>
                </div>
            </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 visible-xs-block visible-sm-block hidden-md ">
            <div class="row">
            <div class="col-md-12 col-sm-12 select-srv-left paddinglf" >
                <div class="row imargin-bottom">
                    <div class="col-md-12">
                      <p></p>
                      <?php $db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
                      $sql = "SELECT image_m FROM models WHERE model_id=?";
                      $result=$db->prepare($sql);
                      $result->bind_param('i',$id);
                      $result->execute();
                      $result->bind_result($image);
                      $result->store_result();
                      $result->fetch()?>
                      <center><img id="srv_model_image" class="img-responsive" src="assets/img/model/<?php echo $image ?>"  responsive></center>
                    </div>
                </div>
                <div class="row">
                    <div id="srv-model_name" class="col-md-12">
                        <h2 class="text-nowrap text-center"><?php echo $model_name ?></h2></div>
                        <input type="text" value="<?php echo $id ?>" name="model_id" hidden=""/>
                </div>
                <div class="row">
                    <div id="srv-price" class="col-md-12">
                        <h3 class="text-center">Total Rs. <strong id="total2">0</strong></h3></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <center><button id="service-req-btn" class="btn btn-danger btn-block btn-lg" type="submit"><img src="assets/img/services/btn-logo.png">&nbsp; Request A Repair </button></center>
                    </div>
                    <div class="col-md-12">
                      <p>
                      <center>
                      <span class="label label-danger"><?php if(isset($_GET['sv'])){
                        echo "No service selected";
                      } ?></span></center>
                      </p>
                      <center><b>State your problem:</b></center>
                      <center class="form-group"><textarea class="form-control" name="other" rows="3" cols="5" style="margin-left:27px; width: 400px"></textarea></center>
                    </div>
                </div>
            </div>
            </div>
          </div>
            <div class="col-md-6 col-sm-12 select-srv-right">
              <div class="container-fluid">
                <div class="row">
                    <div id="srv-heading" class="col-md-12">
                        <h2 class="text-nowrap text-center" style="font-family: slant; font-size: 2.7em"><strong>Choose Repairs</strong></h2>
                      </div>
                    <div class="col-md-12">
                        <div class="row">
                          <div class="btn-group x-services" data-toggle="buttons" >
                            <?php
                            $db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
                            $sql = "SELECT s.service_id,p.price,s.service_name,s.image_s,p.price_id, s.information FROM price p INNER JOIN services s ON p.service_id=s.service_id WHERE model_id=?";
                            $result = $db->prepare($sql);
                            $result->bind_param('i',$id);
                            $result->execute();
                            $result->bind_result($serviceid,$price,$servicename,$images,$priceid,$info);
                            $result->store_result();
                            while($row = $result->fetch()){
                                ?>
                            <label id="<?= $priceid ?>" class="btn btn-primary " data-toggle="popover" data-content="<?= $info ?>"  style="padding-top:20px;white-space: normal; ">
                              <input  type="checkbox" name="service[]"  id="<?= $priceid ?>" onchange="total(<?= $price ?>,<?= $priceid ?>);" value="<?php echo $serviceid; ?>" hidden><image src="assets/img/services/<?php echo $images; ?>" width="70px" responsive>
                              <p><?php echo $servicename;  ?> </p>

                            </label>
                            <script>
                              $(document).ready(function(){
                                  $('[data-toggle="popover"]').popover({trigger: "hover", placement: "bottom", html: "true"});
                              });
                              </script>
                            <?php } ?>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
      </form>
    </div>
</div>
</div>
<?php
include 'footer.php'
?>
