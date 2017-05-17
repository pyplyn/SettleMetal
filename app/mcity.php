<?php
require '../assets/config.php';
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
$sql1 = "SELECT DISTINCT city_name FROM location";
$result = $db->query($sql1);
$output=array();
while($row = $result->fetch_object()){
    $output[]= array('city_name' =>$row->city_name);
}
echo json_encode($output);
 ?>
