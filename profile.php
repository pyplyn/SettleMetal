<script type="application/javascript">
    function getValue(data){
        if (data == "") {
            document.getElementById("txtHint").value = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").value = this.responseText;
                }
            };
            xmlhttp.open("GET","assets/validation/getuser.php?q="+data,true);
            xmlhttp.send();
        }
    }
</script>


<?php
include "header.php";
require "config.php";

$name = $_SESSION['login_user'];
$email = $_SESSION['email'];
$number = $_SESSION['number'];
$id = $_SESSION['user_id'];

?>
<style>
    body{padding-top:100px;}

    .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

    small {
        display: block;
        line-height: 1.428571429;
        color: #999;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            <?php echo $name; ?></h4>
                        <small><cite title="San Francisco, USA">India<i class="glyphicon glyphicon-map-marker">
                                </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?php echo $email; ?>
                            <br />
                            <i class="glyphicon glyphicon-phone"></i><?php echo $number; ?>
                            <br/>

                        <!-- Split button -->
                        <div class="btn-group">
                            <form action="#" method="post">
                                <a id="target" data-toggle="modal" data-target="#editModal" onclick="getValue(<?php echo $id ?>)">Edit </a>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-handshake-o fa-1x" aria-hidden="true"></i> Profile </h4>
            </div>
            <form class="form-horizontal" action = "assets/setinfo/editProfile.php" method="post">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-md-12">

                        <div class="page-header">

                            </div>
                        <p class="lead">Contact number:<input type="tel" maxlength="10" class="form-control" name="num"> </p>
                        <p class="lead">Email:<input type="text" class="form-control" name="email"> </p>

                    </div>
                    <div class="col-md-12">

                            <input type="hidden" id="txtHint" name="id">

                            <div class="col-sm-12" "col-md-8">

                    </div>
                </div>
                <p class="text-right">
                    <button class="btn btn-default" type="submit">Save <script></script></button>
                </p>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php
include "footer.php";
?>
