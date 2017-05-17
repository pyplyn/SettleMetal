<?php
$_POST=json_decode(file_get_contents('php://input'), true);
//$pass=$_POST['password'];
//$phone=$_POST['phone'];
//$email=$_POST['email'];

//echo "done";

require '../config.php';
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());

$sql = "select * from users";
$result = $db->query($sql);
$output = array();
$output = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($output);
?>