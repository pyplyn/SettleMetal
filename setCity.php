<?php
session_start();
$_SESSION['city'] = $_GET['city'];
echo $_SESSION['city'];

?>