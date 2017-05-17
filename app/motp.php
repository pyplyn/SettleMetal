<?php
$_POST=json_decode(file_get_contents('php://input'), true);
ob_start();
session_start();
$phone = $_POST['number'];
include 'motpcon.php';
$six_digit_random_number = "Your OTP is ".$_POST['otp']." for registering your mobile number with Settlemetal";
sendsmsPOST($phone, "SMETAL", 1, $six_digit_random_number, "msg.msgclub.net", "4ef8ad7e74bdf446d5db36da2dd1b24a");
echo "success";
?>
