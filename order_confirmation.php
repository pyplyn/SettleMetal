<?php
session_start();
include 'conn.php';
$_SESSION['order_confirm'] = 1;
$phone = $_SESSION['number'];
$six_digit_random_number = mt_rand(100000, 999999);
$_SESSION['otp'] = $six_digit_random_number;
sendsmsPOST($phone, "SMETAL", 1, "Your OTP is $six_digit_random_number for confirming the order with Settlemetal", "msg.msgclub.net", "4ef8ad7e74bdf446d5db36da2dd1b24a");
header('Location:otp.php');

?>