<?php
ob_start();
function sendMail($to, $from, $subject, $messageee) {
// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers .= "From:Team Settlemetal <$from>" . "\r\n";
    mail($to, $subject, $messageee, $headers);
}
  include 'header1.php';
  require 'config.php';
  include 'conn.php';
  if(isset($_POST['email']))
  {
    $db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
    $email=$_POST['email'];
    $name = $_POST['name'];
    $_SESSION['tempUser_name'] = $name;
    $_SESSION['tempUser_email'] = $email;
    $sql11="select user_id,user_phone,user_name,user_email,verify from users where user_email=?";
    $result11= $db->prepare($sql11);
    $result11->bind_param('s',$_SESSION['tempUser_email']);
    $result11->execute();
    $result11->bind_result($user_id,$user_phone,$user_name,$user_email,$verify);
    $result11->store_result();
    if($result11->num_rows == 1)
    {
      $result11->fetch();
      $_SESSION['login_user'] = $user_name;
      $_SESSION['email'] = $user_email;
      $_SESSION['number'] = $user_phone;
      $_SESSION['user_id'] = $user_id;
      $_SESSION['verify'] = $verify;
      $url = $_SESSION['url'];
      header("Location:$url");
    }
  }

  if(isset($_POST['otp']))
  {
    if($_POST['otp'] == $_SESSION['otp'] )
    {
      $db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
      $sql="select user_id,user_phone,user_name,user_email,verify from users where user_email=?";
      $result= $db->prepare($sql);
      $result->bind_param('s',$_SESSION['tempUser_email']);
      if($result->execute())
      {
        $result->bind_result($user_id,$user_phone,$user_name,$user_email,$verify);
        $result->store_result();
        if($result->num_rows == 1)
        {
          $_SESSION['login_user'] = $user_name;
          $_SESSION['email'] = $user_email;
          $_SESSION['number'] = $user_phone;
          $_SESSION['user_id'] = $user_id;
          $_SESSION['verify'] = $verify;
          $url = $_SESSION['url'];
          header("Location:$url");
        }
        else {
              $sql="Insert into users(user_name,user_email,user_phone,verify) Values(?,?,?,'yes')";
              $result= $db->prepare($sql);
              $result->bind_param('ssi',$_SESSION['tempUser_name'],$_SESSION['tempUser_email'],$_SESSION['tmpPhone']);
              if($result->execute())
              {
                $_SESSION['login_user'] = $_SESSION['tempUser_name'];
                $_SESSION['email'] = $_SESSION['tempUser_email'];
                $_SESSION['number'] = $_SESSION['tmpPhone'];

                $sql11="select user_id from users where user_email=?";
                $result11= $db->prepare($sql11);
                $result11->bind_param('s',$_SESSION['tempUser_email']);
                $result11->execute();
                $result11->bind_result($user_id2);
                $result11->store_result();
                $result11->fetch();
                $_SESSION['user_id'] = $user_id2;
                $_SESSION['verify'] = 'yes';
                $url = $_SESSION['url'];
                header("Location:$url");
              }
              else {
                echo "Error while updating user db";
              }
        }
      }
    }
  }
  if(isset($_POST['phoneNumber']))
  {
    $number = $_POST['phoneNumber'];
    $random5 = mt_rand(10000, 99999);
    $_SESSION['otp'] = $random5;
    $_SESSION['tmpPhone'] = $number;
    $six_digit_random_number = "Your OTP is ".$random5." for registering your mobile number with Settlemetal";
    sendsmsPOST($number, "SMETAL", 1, $six_digit_random_number, "msg.msgclub.net", "4ef8ad7e74bdf446d5db36da2dd1b24a");
  }



 ?>
 <style>
     @import url("http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700");
     @import url("http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600|Roboto Mono");

     @font-face {
         font-family: 'Dosis';
         font-style: normal;
         font-weight: 300;
         src: local('Dosis Light'), local('Dosis-Light'), url(http://fonts.gstatic.com/l/font?kit=RoNoOKoxvxVq4Mi9I4xIReCW9eLPAnScftSvRB4WBxg&skey=a88ea9d907460694) format('woff2');
     }
     @font-face {
         font-family: 'Dosis';
         font-style: normal;
         font-weight: 500;
         src: local('Dosis Medium'), local('Dosis-Medium'), url(http://fonts.gstatic.com/l/font?kit=Z1ETVwepOmEGkbaFPefd_-CW9eLPAnScftSvRB4WBxg&skey=21884fc543bb1165) format('woff2');
     }
     body {
         background: #d2d6de;
         font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif,  Open Sans;
         font-size: 14px;
         line-height: 1.42857;
         height: 350px;
         padding: 0;
         margin: 0;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
         font-weight: 400;
         overflow-x: hidden;
         overflow-y: auto;

     }
     .form-control {
         background-color: #ffffff;
         background-image: none;
         border: 1px solid #999999;
         border-radius: 0;
         box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
         color: #333333;
         display: block;
         font-size: 14px;
         height: 34px;
         line-height: 1.42857;
         padding: 6px 12px;
         transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
         width: 100%;
     }

     .login-box, .register-box {
         width: 360px;
         margin: 7% auto;
     }.login-page, .register-page {
          background: #d2d6de;
      }

     .login-logo, .register-logo {
         font-size: 35px;
         text-align: center;
         margin-bottom: 25px;
         font-weight: 300;
     }.login-box-msg, .register-box-msg {
          margin: 0;
          text-align: center;
          padding: 0 20px 20px 20px;
      }.login-box-body, .register-box-body {
           background: #fff;
           padding: 20px;
           border-top: 0;
           color: #666;
       }.has-feedback {
            position: relative;
        }
     .form-group {
         margin-bottom: 15px;
     }.has-feedback .form-control {
          padding-right: 42.5px;
      }.login-box-body .form-control-feedback, .register-box-body .form-control-feedback {
           color: #777;
       }
     .form-control-feedback {
         position: absolute;
         top: 0;
         right: 0;
         z-index: 2;
         display: block;
         width: 34px;
         height: 34px;
         line-height: 34px;
         text-align: center;
         pointer-events: none;
     }.checkbox, .radio {
          position: relative;
          display: block;
          margin-top: 10px;
          margin-bottom: 10px;
      }.icheck>label {
           padding-left: 0;
       }
     .checkbox label, .radio label {
         min-height: 20px;
         padding-left: 20px;
         margin-bottom: 0;
         font-weight: 400;
         cursor: pointer;
     }
 </style>

 <div class="login-box">
     <div class="login-logo">
         <a href="#"><img src="assets/img/footer/LOGO.png" height="80px" alt="Settlemetal"></a>
     </div><!-- /.login-logo -->
     <div class="login-box-body">
         <?php
             if(isset($_GET['otpFasle'])){
                 echo '<div class="alert alert-warning">
   <strong>Please enter the correct OTP.
 </div>';
             }
         ?>
         <p class="login-box-msg">Pleas enter the OTP</p>
         <form action="fbUser.php" method="post" accept-charset="utf-8">
              <div class="form-group has-feedback">
                 <input readonly type="text" name="phonenumber" value="<?php if(isset($_POST['phoneNumber'])){echo $_POST['phoneNumber']; } ?>" placeholder="Phone number" class="form-control" id="login" maxlength="80" size="30">            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                 <span><font color="red"></font></span>
             </div>
             <div class="form-group has-feedback">
                 <input type="password" name="otp" value="" placeholder="OTP" class="form-control" id="password" size="30">            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                 <span><font color="red"></font></span>
             </div>
             <div class="row">

                 <div class="col-xs-12">
                    <center>
                      <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-block btn-blue">
                    </center>
                  </div><!-- /.col -->
             </div>
         </form>
     </div><!-- /.login-box-body -->
 </div>

 <?php
 include "footer.php";
 ?>
