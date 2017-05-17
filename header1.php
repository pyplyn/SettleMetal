<!DOCTYPE html>
<?php session_start();
ob_start();
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="icon" type="image/png" href="assets/img/favicon/LOGOicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://use.fontawesome.com/99187b31a1.js"></script>

  <script src="assets/validation/validation.js"></script>

</head>

<body>
  <script>
  var userEmail;
  var userName;
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1982089225360549',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
    FB.getLoginStatus(function(response){
      if (response.status === 'connected') {
        document.getElementById('fbstatus').innerHTML = "we are connected";
      }
      else if (response.status==='not_authorized') {
        document.getElementById('fbstatus').innerHTML = "we are not loggedin";
      }
      else {
        document.getElementById('fbstatus').innerHTML = "you are not logged into facebook";
      }
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   function fblogin(){
     FB.login(function(response){
       if (response.status === 'connected') {
         document.getElementById('fbstatus').innerHTML = "we are connected";
         document.getElementById('fb_login').style.display = 'none';
         document.getElementById('fb_logout').style.display = 'block';
         getfbInfo();
       }
       else if (response.status==='not_authorized') {
         document.getElementById('fbstatus').innerHTML = "we are not loggedin";
       }
       else {
         document.getElementById('fbstatus').innerHTML = "you are not logged into facebook";
       }
     }, {scope: 'email'}  );
   }
   function getfbInfo() {
     FB.api(
             '/me',
             'POST',
             {"fields":"id,name,email"},
             function(response) {
                 document.getElementById('email-id').value  = response.email;
                userEmail = response.email;
                 userName = response.name;
                 alert(userEmail+userName);
                 insertUser();
             }
            );
		}
    function insertUser() {
        jQuery.ajax({
            url: "fbUser.php",
            data:'email='+userEmail+'&name='+userName,
            type: "POST",
            success:function(data){
              document.getElementById('fbOtp').style.display = 'block';
              document.getElementById('fbstatus').innerHTML = "ok";
            },
            error:function (){}
        });
    }
    function getlostfb(){
    FB.logout(function(response) {
      document.getElementById('fb_login').style.display = 'block';
      document.getElementById('fb_logout').style.display = 'none';
      document.getElementById('fbOtp').style.display = 'none';
    });
  }
</script>
<nav id="nav-bar-op" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button"  class="navbar-toggle collapsed toggle-button" data-toggle="collapse" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand navbar-link" href="index.php"><img src="assets/img/LOGO.png" width="190px"> </a></div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav navbar-right" >
                <li role="presentation"><a class="nav-btn2 text-center" href="index.php#how-it-works">&nbsp;How it works</b></a></li>

                <?php if(!isset($_SESSION['login_user'])){
                  ?>
                  <li role="presentation"><a id="nav-login" class="text-center" href="#" data-toggle="modal" data-target="#myModal">&nbsp;LOGIN / SIGN UP &nbsp;<span class="glyphicon glyphicon-chevron-down"></span></a></li>
                <?php
                }
                else {
                  ?>
                <li role="presentation"><a id="nav-login" class="text-center" href="assets/deleteinfo/logout.php" data-toggle="dropdown"><?= $_SESSION['login_user']; ?></b>&nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li role="presentation"><a class="text-center" role="menuitem" tabindex="-1" href="user_profile.php">Profile</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a class="text-center" role="menuitem" tabindex="-1" href="logout.php">Sign out</a></li>
                  </ul>
                </li>
                <?php }
                ?>


            </ul>
        </div>
    </div>
</nav>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-handshake-o fa-1x" aria-hidden="true"></i> Login Panel</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" action="login.php">
                        <div class="form-group">
                          <span id="fbstatus" style="display:none"></span><br>
                            <?php if(isset($_GET['login'])){ ?><center><p><label class="label label-danger">Invalid Email/Password</label></p></center><?php } ?>
                            <label class="control-label">Email</label>
                            <input class="form-control input-lg" type="text" name="username">
                        </div>

                        <div class="form-group">

                            <label class="control-label">Password</label>
                            <input class="form-control input-lg" type="password" name="pass4word">
                        </div>
                        <div class="form-group">Click <a href="register.php">here</a> to register</div>
                        <div class="form-group">
                            <button class="btn btn-block btn-blue" type="submit" name="submit">Login </button>
                        </div>
                        

                        <center>
                        <button id="fb_login" class="btn btn-blue btn-block" type="button" onClick="fblogin()" style="background-color: #3b5998"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook login</button>
                        <span id="fb_logout" style="display: none">Enter your mobile number or <a  href="#" onClick="getlostfb()" >Logout</a>
                        </span>
                      </center>
                    </form>
                    <form  action="fbUser.php" method="post">
                      <p> </p>
                      <div id="fbOtp" class="form-group" style="display:none;">
                        <input class="form-control input-lg" placeholder="Mobile number" type="text" name="phoneNumber" required="mobile number">
                        <button class="btn btn-blue btn-block" type="submit">Next</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
