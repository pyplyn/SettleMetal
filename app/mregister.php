<?php
$_POST=json_decode(file_get_contents('php://input'), true);
require '../config.php';
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
$username = $_POST['user_name'];
$password = $_POST['pass4word'];
$phone = intval($_POST['user_phone']);
$email = $_POST['user_email'];

  $sql = "INSERT INTO users(user_name,pass4word,user_phone,user_email) VALUES (?,?,?,?)";
  $result = $db->prepare($sql);
  $result->bind_param('ssis',$username,$password,$phone,$email);
  if($result->execute()){
      echo "success";
  }
  else{
      echo "unsuccess: ".$db->error;
  }
?>
