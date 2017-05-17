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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/99187b31a1.js"></script>

    <script src="assets/validation/validation.js"></script>

</head>

<body>
<nav id="nav-bar-op" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed toggle-button" data-toggle="collapse" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand " href="index.php" style="padding: 10px 0px 0px 10px; width:100px">
            <img src="assets/img/LOGO.png" width="190px" alt="settlemetal">
            </a>
        </div>
        <div class="collapse navbar-collapse dropdown" id="navcol-1">
            <ul class="nav navbar-nav navbar-right" >
                <li role="presentation"><a class="nav-btn2" href="#how-it-works" data-spy="scroll" data-target="#how-it-works">How it works</a></li>
                <?php if(isset($_SESSION['login_user'])){
                  ?>
                  <li role="presentation"><a id="nav-login" class="dropdown-toggle" href="user_profile.php" data-toggle="dropdown"><?= $_SESSION['login_user']; ?>&nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="user_profile.php">Profile</a></li>
                      <li role="presentation" class="divider"></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Sign out</a></li>
                    </ul>
                  </li>

                <?php
                }
                else {
                  ?>
                <li role="presentation"><a id="nav-login" href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-exclamation fa-1x" aria-hidden="true"></i>&nbsp;LOGIN/SIGN UP</b></a></li>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
