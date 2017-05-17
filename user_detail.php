<?php
$user_id = $_POST['id'];
$model_id = $_POST['model'];
$order_id = $_POST['order'];
include 'header1.php';
require 'config.php';
$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$sql = "SELECT * FROM activities WHERE user= $user_id and order_id= $order_id ";
$result = $db->query($sql);
$status = $result->fetch_object();
$email=$status->email;
$phone=$status->phone;
$trid = $status->transaction_id;
$paytype =$status->payment_type;
$total = 0;

$MERCHANT_KEY = "z9azin";

// Merchant Salt as provided by Payu
$SALT = "B2telXtK";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {
    $posted[$key] = $value;

  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])

  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
  <script>
  function sendotp() {

      jQuery.ajax({
          url: "conformCOD.php",
          data:{
            resendotp: "true",
            email: "<?= $email ?>",
            phone: "<?= $phone ?>",
          },
          type: "POST",
          success:function(data){
              $("#OTPmessage").html(data);
          },
          error:function (){
            alert('error');
          }
      });
  }
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }

  </script>

<div class="container" style="margin:55px;">
    <!-- Data fetching code-->

    <h2>Status:<font color="red"><?php
    if($trid==null){
      echo $status->status;
    }
    else {
      echo " Payed: ".$paytype;

    } ?></font></h2>
    <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Model</th>
            <th>Service Name</th>
            <th style="text-align:center">Price</th>
            <th style="text-align:center">Additional cost</th>

        </tr>
        </thead>
        <tbody>

        <?php
        if(isset($_POST['cancel']))
        {
         $sql4 = "SELECT * FROM activities WHERE user=$user_id AND model=$model_id AND order_id=$order_id";

        }
        else
        {
        $sql4 = "SELECT * FROM activities WHERE user=$user_id AND model=$model_id AND order_id=$order_id";
        }

        $result4 = $db->query($sql4);
        while($row4 = $result4->fetch_object()) {
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

            <tr><form action="update_price.php?id=<?php echo $row4->barcode; ?>" method="post">
                    <td><?php echo $model; ?></td>
                    <td ><?php echo $service; ?></td>
                    <td style="text-align:right"><?php echo $row4->price;$total += $row4->price + $row4->updated_price; ?>
                    <td style="text-align:right"><?php echo $row4->updated_price; ?>

                </form>

            </tr>

            <?php
        }
        ?>
        <tr>
          <td colspan="2" style="text-align:right"><h4><b>Total</b></h4></td>
          <td colspan="2" style="text-align:center"><h4><b>&#8377; &nbsp;<?php echo $total; $_SESSION['totalpay']=$total; ?></b></h4></td>
        </tr>
        </tbody>
    </table>
    <form action="change_status.php?id=<?php echo $user_id; ?>" method="post" enctype="multipart/form-data">
        <!-- End of the code -->

        <!-- for image --><?php
        $sql41 = "SELECT * FROM activities WHERE user=$user_id ";

        $result41 = $db->query($sql41);
        $row41 = $result41->fetch_object();
        ?>
        <!-- end of the code -->



    </form>
    <?php
        if(!isset($_POST['cancel'])){
            echo '<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal">Cancel order</button>';
        }
    ?>
    <?php
    if($status->status == "Payment awaited" and $trid == null)
    {
    ?>
    <div class="col-sm-12">
      <form action="<?php echo $action; ?>" method="post" name="payuForm">
        <input type="hidden" name="id" value="<?= $user_id ?>"/>
        <input type="hidden" name="model" value="<?= $model_id ?>"/>
        <input type="hidden" name="order" value="<?= $order_id ?>"/>
        <!----------    user info for payment      -------------->
        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
        <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
        <input type="hidden" name="amount" value="<?= $_SESSION['totalpay'] ?>" />
        <input type="hidden" name="firstname" value="<?= $user_id ?>" />
        <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>"/>
        <input type="hidden" name="phone" value="<?= $_SESSION['number'] ?>"/>
        <input type="hidden" name="productinfo" value="<?= $order_id ?>" />
        <input type="hidden" name="surl" value="http://www.settlemetal.com/SM_DEV/assets/payment/success.php"/> <!-- Success notification -->
        <input type="hidden" name="furl" value="http://www.settlemetal.com/SM_DEV/assets/payment/failure.php"/> <!-- Failure notification -->
        <center><input class="btn btn-blue" type="submit" value="Checkout Online" />
        <button class="btn btn-blue" type="button" data-toggle="modal" data-target="#conformCOD" onclick="sendotp()" > Chase on delivery </button>
        </center>
      </form>
      <hr>
      <p class="text-center">Online secure payment will be done by <img src="assets/img/PayUMoney_logo.png" alt="payUmoney" width="100" responsive></p>
    </div>
    <?php
    }
    else{
    	  if(!isset($_POST['cancel']))
        {
      ?>
      <div class="col-sm-12">
        <center><input class="btn btn-blue" type="submit" value="Checkout Online" disabled="disabled">
        <input name="cod" class="btn btn-blue" type="submit" value="Cash On Delivery" disabled="disabled">
          <br>
          <span class="label label-info">Your device is under investigation..</span>
        </center>
      </div>
      <?php
      }
    }
    ?>
</div>
<?php
include 'footer.php';
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
                <a href="cancel.php?order=<?php echo $order_id; ?>" class="btn btn-info" role="button">Yes</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
        </div>

    </div>
</div>
<div id="conformCOD" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content modal-sm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">OTP</h4>
            </div>
            <div class="modal-body">
                <p>OTP for conformation has been sended to you!</p>
                <form action="conformCOD.php" method="post">
                  <input type="hidden" name="user_id" value="<?= $user_id ?>" >
                  <input type="hidden" name="order_id" value="<?= $order_id ?>" >
                  <input type="hidden" name="email" value="<?= $email ?>" >
                  <input type="hidden" name="phone" value="<?= $phone ?>" >
                  <input type="text" name="conformCOD"/>
                <button class="btn btn-info" type="submit">Conform</button>
                <span class="text-center" id="OTPmessage"></span>
              </form>
            </div>
        </div>

    </div>
</div>
<!--end of modal view-->
