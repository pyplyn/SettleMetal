<?php
session_start();
print_r($_SESSION['services']);
session_destroy();

?>