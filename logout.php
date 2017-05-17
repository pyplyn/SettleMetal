<?php
session_start();

unset($_SESSION['services']);
session_destroy();
unset($_SESSION['login_user']);
header("location:index.php");


?>
