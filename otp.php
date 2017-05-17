<?php
include 'header1.php';
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
        <a href="#"><img src="assets/img/footer/LOGO.png" height="80px" alt="My Ad Cubes"></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <?php
            if($_SESSION['mail_check'] == 1){
                echo '<div class="alert alert-warning">
  <strong>Please enter the correct OTP.
</div>';
            }
        ?>
        <p class="login-box-msg">Pleas enter the OTP</p>
        <form action="assets/setinfo/otp_check.php" method="post" accept-charset="utf-8">        <div class="form-group has-feedback">
                <input readonly type="text" name="login" value="<?php echo $_SESSION['number']; ?>" placeholder="Username" class="form-control" id="login" maxlength="80" size="30">            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <span><font color="red"></font></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" value="" placeholder="OTP" class="form-control" id="password" size="30">            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span><font color="red"></font></span>
            </div>
            <div class="row">

                <div class="col-xs-4">
                    <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-primary btn-block btn-flat">            </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.login-box-body -->
</div>

<?php
include "footer.php";
?>