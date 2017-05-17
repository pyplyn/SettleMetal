<?php
include 'header1.php';


?>
<div class="row" style="height:100%">
<center>
<div class="jumbotron text-xs-center" >
    <h1 class="display-3">Thank You!</h1>
    <p>Order ID : <b>
      <?php echo $_SESSION['order_id'];
     ?>
   </b></p>
    <p class="lead"><strong>Your order has been completed.</strong> We will contact you at the time of Pick Up and will keep you posted about every move we make.</srong></p>
    <hr>
    <p>
        Have queries? Contact us at <b><u>8884422335</u> or write to us at <b><u>order@settlemetal.com</u>
    </p>
    <p class="lead">
    You can track your order in your&nbsp;
        <a class="btn btn-primary btn-sm" href="user_profile.php" role="button">Profile</a>

    </p>
</div>
</center>
</div>

<?php
include 'footer.php';

?>
