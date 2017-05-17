<?php

require '../config.php';
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
$sql2 = "SELECT * FROM category";
$result = $db->query($sql2);
$output = array();
$output = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($output);

?>
