<?php
$_POST=json_decode(file_get_contents('php://input'), true);
require '../config.php';
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
if(!empty($_POST['user_email']) and isset($_POST['user_email']))
{
  $email=$_POST['user_email'];
  $pass=$_POST['pass4word'];
  $sql = "SELECT user_id, user_email, user_name, pass4word, active, user_phone from users where user_email =? and pass4word=?";
  $result = $db->prepare($sql);
  $result->bind_param('ss',$email,$pass);
  $output=array();
  if($result->execute())
  {
    $result->bind_result($user_id,$user_email,$user_name,$pass4word,$active,$user_phone);
    $result->store_result();
    if($result->fetch())
    {
      $output[] = array('user_id' => $user_id, 'user_email' => $user_email , 'user_name' => $user_name,'pass4word' => $pass4word,'active' => $active,'user_phone' => $user_phone );
    }
    echo json_encode($output);
  }
  else{
      echo "null";
  }
}
?>
