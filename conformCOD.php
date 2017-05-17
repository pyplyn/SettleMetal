<?php
session_start();
require 'config.php';
include 'conn.php';

function sendOTP()
{
  $email=$_POST['email'];
  $phone=$_POST['phone'];
    echo "$email";
  $otp = mt_rand(100000, 999999);
  $_SESSION['COD_OTP'] =$otp;
  sendsmsPOST($phone, "SMETAL", 1, "Your Case on delivery OTP: $otp \nRegards,\nTeam Settlemetal", "msg.msgclub.net", "4ef8ad7e74bdf446d5db36da2dd1b24a");
}
if(isset($_POST['resendotp']))
{
    if($_POST['resendotp']=='true'){
      sendOTP();
  }
}
else {
  if(isset($_SESSION['COD_OTP']))
{
  $db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
  $otp=$_POST['conformCOD'];
  $productinfo=$_POST['order_id'];
  $user_id=$_POST['user_id'];
  if($otp==$_SESSION['COD_OTP'])
  {
    $txnid = mt_rand(1000000, 9999999).$_SESSION['user_id']."COD";
    $sql = "UPDATE activities SET payment_type='COD' , transaction_id=? where user=? and order_id=?";
    $result=$db->prepare($sql);
    $result->bind_param('sii',$txnid,$user_id,$productinfo);
    if($result->execute())
    {

      ?>
      <html>
      <head><title>COD | Settlemetal</title></head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/user.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <body>
      <div class="jumbotron text-center" style="height:100%" >
          <h1 class="display-3">Thank You!</h1>
          <p class="lead">Your COD ID: <strong><span class="text-success"> <?= $txnid ?></span>.</strong> </p>
          <p>Your Case on delivery has been done.</p>
          <hr>
          <p>
              Have queries? Contact us at <b><u>8884422335</u></b> or write to us at<b> <u>order@settlemetal.com</b></u>
          </p>
          <p class="lead">
          You can track your order in your&nbsp;
              <a class="btn btn-primary btn-sm" href="user_profile.php" role="button">Profile</a>

          </p>
      </div>
    </body>
    </html>
      <?php
    }
  }
  else {
    ?>
    <html>
    <head><title>COD | Settlemetal</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/user.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
    <div class="jumbotron text-center" style="height:100%" >
        <h1 class="display-3">OOPS!</h1>
        Please make sure that you have entered a correct OTP.
        <hr>
        <p>
            Have queries? Contact us at <b><u>8884422335</u></b> or write to us at<b> <u>order@settlemetal.com</b></u>
        </p>
        <p class="lead">
        Please try again&nbsp;
            <a class="btn btn-primary btn-sm" href="user_profile.php" role="button">Profile</a>

        </p>
    </div>
  </body>
  </html>
  <?php
    }
  }
else{
  sendOTP();
}
}


 ?>
