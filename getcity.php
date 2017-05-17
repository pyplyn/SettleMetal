<?php
$device = $_GET['city'];

require 'config.php';
$dbc = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());

$sql = "SELECT location_name FROM location WHERE city_name=$device";
if($result = $dbc->query($sql)){
    echo "<option>--Select--</option>";
    while($row = $result->fetch_object()){
        echo "<option value = '".$row->location_name."' >".$row->location_name."</option>";
    }
}
else
    echo $dbc->error;

?>