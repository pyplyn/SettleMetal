<?php
$p = $_GET['q'];
//code for uploading the pictures
//uploading the image
$target_dir = "assets/img/report_image/$p/";
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


$file = basename($_FILES["fileToUpload"]["name"]);
require "config.php";
$p = $_GET['q'];


$db = new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE);
$col = array();
$col = $_POST['c'];

$sql1 = "UPDATE `report` SET screenDisplay_pre='$col[0]',
screenDisplay_post='$col[1]',
lcd_pre='$col[2]',
lcd_post='$col[3]',
earSpeaker_pre='$col[4]',
earSpeaker_post='$col[5]',
microphone_pre='$col[6]',
microphone_post='$col[7]',
proximity_pre='$col[8]',
proximity_post='$col[9]',
frontCam_pre='$col[10]',
frontCam_post='$col[11]',
flash_pre='$col[12]',
flash_post='$col[13]',
volume_pre='$col[14]',
volume_post='$col[15]',
power_pre='$col[16]',
power_post='$col[17]',
simCard_pre='$col[18]',
simCard_post='$col[19]',
allScrew_pre='$col[20]',
allScrew_post='$col[21]',
bodyFrame_pre='$col[22]',
bodyFrame_post='$col[23]',
touch_pre='$col[24]',
touch_post='$col[25]',
wifi_pre='$col[26]',
wifi_post='$col[27]',
loudSpeaker_pre='$col[28]',
loudSpeaker_post='$col[29]',
headJack_pre='$col[30]',
headJack_post='$col[31]',
gyroscope_pre='$col[32]',
gyroscope_post='$col[33]',
backCam_pre='$col[34]',
backCam_post='$col[35]',
charging_pre='$col[36]',
charging_post='$col[37]',
home_pre='$col[38]',
home_post='$col[39]',
soft_pre='$col[40]',
soft_post='$col[41]',
vibration_pre='$col[42]',
vibration_post='$col[43]',
image_report='$file' WHERE `order_report`=$p";
if($result = $db->query($sql1)){
echo "done";
}
else
    echo $db->error;

?>