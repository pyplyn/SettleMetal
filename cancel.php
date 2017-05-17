<?php
session_start();
include "config.php";
include 'conn.php';
$id = $_GET['order'];
$number = $_SESSION['number'];
sendsmsPOST($number, "SMETAL", 1, "Your order has been cancelled\nRegards\nTeam Settlemetal", "msg.msgclub.net", "4ef8ad7e74bdf446d5db36da2dd1b24a");
$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);


$sql = "UPDATE activities SET status='cancelled' WHERE order_id=$id ";
if($result = $db->query($sql)){
    header('Location:user_profile.php');
}
else
    echo $db->error;

?>
