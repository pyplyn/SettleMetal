<?php
$_POST=json_decode(file_get_contents('php://input'), true);
require '../assets/config.php';
$city=$_POST['city_name'];
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
$sql1 = "SELECT location_name FROM location WHERE city_name='$city'";
$result = $db->query($sql1);
while($row = $result->fetch_object()){
    $output[]= array('location_name' =>$row->location_name);
}
echo json_encode($output);

 ?>
