<?php
$_POST=json_decode(file_get_contents('php://input'), true);
require '../assets/config.php';
$location_name=$_POST['location_name'];

$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
$sql1 = "SELECT address FROM location WHERE location_name='$location_name'";
$result = $db->query($sql1);
while($row = $result->fetch_object()){
    $output[]= array('address' =>$row->address);
}
echo json_encode($output);
 ?>
