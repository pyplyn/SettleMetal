<?php
ob_start();
session_start();
$phone = $_SESSION['number'];
include 'conn.php';
$six_digit_random_number = mt_rand(100000, 999999);
$_SESSION['otp'] = $six_digit_random_number;
sendsmsPOST($phone, "SMETAL", 1, $six_digit_random_number, "msg.msgclub.net", "4ef8ad7e74bdf446d5db36da2dd1b24a");
header('Location:otp.php');
?>