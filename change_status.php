<?php
ob_start();


if(isset($_GET['id']))
{
  $user = $_GET['id'];
}
else {
    $user = $_POST['id'];
}
$model = $_POST['model'];
$status = $_POST['status'];
$device_id = $_POST['device'];
$order_id = $_POST['order'];
include "myfirst.php";
include 'conn.php';
include "config.php";
$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$transaction = $order_id;
$user_id = $user;
//uploading the image
$target_dir = "assets/img/status/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$file = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo "File is not an image.";
    $uploadOk = 0;

}
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/
// Allow certain file formats



if($imageFileType != ("jpg" || "JPG") && $imageFileType != ("PNG" || "png" ) && $imageFileType != ("jpeg" || "JPEG")
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//end of the code

// fetching user detail

$sql_user = "SELECT * FROM users WHERE user_id=$user_id";
$result_user = $db->query($sql_user);
$row = $result_user->fetch_object();
$phone = $row->user_phone;
$email = $row->user_email;
$verify = $row->verify;
sendMail("$email","SMETAL","Order Update","Your order status for order ID $transaction is: $status <br>Regards,<br>Team Settlemetal");
if($verify == "yes") {
    sendsmsPOST($phone, "SMETAL", 1, "Your order status for order ID $transaction is: $status \nRegards,\nTeam Settlemetal", "msg.msgclub.net", "4ef8ad7e74bdf446d5db36da2dd1b24a");
}
//end of code


$sql = "UPDATE activities SET status='$status',image='$file' WHERE user=$user AND order_id=$order_id";
if($result = $db->query($sql)){

    header("Location:details.php?model=$model&user=$user&device=$device_id&order=$order_id");
}
else
    $db->error;

?>
