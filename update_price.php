<?php
require "config.php";
$db= new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);

$barcode = $_GET['id'];
$price = $_POST['price'];
$update = $_POST['update_price'];

$sql = "UPDATE activities SET price=$price,updated_price=$update WHERE barcode=$barcode";
if($result = $db->query($sql)){
    header("Location:admin.php");
}

?>