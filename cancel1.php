<?php
$id = $_GET['id'];
$mode_id = $_GET['model'];
include "config.php";
$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$sql = "UPDATE activities SET status='cancelled' AND model=$model_id WHERE user=$id ";
if($result = $db->query($sql)){
    header('Location:admin.php');
}
else
    echo $db->error;

?>