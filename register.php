<?php
include 'header1.php';
$_SESSION['mail_check']=0;
?>
<script>
    function checkAvailability_email() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "assets/validation/check_availability_email.php",
            data:'email='+$("#email").val(),
            type: "POST",
            success:function(data){
                $("#email-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error:function (){}
        });
    }
    function check_password() {
      var p1=document.getElementById('pwd');
      var p2=document.getElementById('pwd2');
      if(p1.value == p2.value)
      {
        document.getElementById('pwd_status').innerHTML=" ";
      }
      else {
        document.getElementById('pwd_status').innerHTML="Not matching";
      }
    }
</script>
<div class="row login-frm paddingtb"><!-- start form-->
  <div id="login_form" class="paddinglf  new-row  col-lg-offset-3 col-md-6 col-sm-9 col-md-offset-3 col-sm-offset-2 shadow-left">
      <form class="margin-0-tb" action="assets/setinfo/reg.php" method="post">
          <div class="form-group header-label">
              <label class="control-label" id="sign-label">Register</label>
          </div>
          <div class="container-fluid">
            <?php
            if(isset($_GET['register'])){
              if($_GET['register']=='false_email')
              {
              ?>
              <div id="login-false" class="form-group ">
                <div class="row">
                    <div id="email-availability-status" class="col-md-12"><center><span class="label label-danger">Incorrect Email !</span></center></div>
                    <div class="col-md-12"><center><span class="label label-danger">Incorrect Email !</span></center></div>
                </div>
              </div>
              <?php } else{ ?>
            <div id="login-false" class="form-group ">
              <div class="row">
                  <div class="col-md-12"><center><span class="label label-danger">Password does not match !</span></center></div>
              </div>
            </div><?php } }
            ?>
            <div class="form-group">
                <input class="form-control input-lg" onBlur="checkAvailability()" required id="username" name="username" id="username" type="text" placeholder="User name">
                <p> <span id="user-availability-status"></span></p>
            </div>
            <div class="form-group">
                <input class="form-control input-lg" onBlur="checkAvailability_email()" name="email" required id="email" type="email" placeholder="Email">
                <p> <span id="email-availability-status"></span></p>
            </div>
            <div class="form-group">
                <input class="form-control input-lg" name="pass4word" id="pwd" type="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input class="form-control input-lg" oninput="check_password()" name="pass4word2" id="pwd2" type="password" placeholder="Confirm Password">
                <p><span id="pwd_status" class="text-danger"></span></p>
            </div>
            <div class="form-group">
                <input class="form-control input-lg" name="phone" id="phone" type="number" placeholder="Phone number">
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-blue" type="submit" name="submit">SIGN UP </button>
            </div>
          </div>
          <div class="form-group footer-label margin-0-tb">
              <div class="row">
                  <div class="col-sm-9">
                      <label id="new-account" class="control-label">Already SignUp ?</label>
                  </div>
                  <div class="col-sm-3">
                      <a class="btn btn-green btn-green btn-block" role="button" href="ask_address.php">Login</a>
                  </div>
              </div>
          </div>
      </form>
  </div>
</div><!-- end form -->

<?php
include 'footer.php';
?>
