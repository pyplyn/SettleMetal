<?php
session_start();
include("assets/config.php");

if(isset($_SESSION['url']))
{
  $url =$_SESSION['url'];
}
else {
  $url="index.php";
}
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
session_start();


    // username and password sent from form

    $myemail = $_POST['username'];
    $mypassword = mysqli_real_escape_string($db,$_POST['pass4word']);

    $sql = "SELECT user_name,user_email,user_phone,user_id,verify FROM users WHERE user_email =? and pass4word =?";
    $result=$db->prepare($sql);
    $result->bind_param('ss',$myemail,$mypassword);
    $result->execute();
    $result->bind_result($username,$email,$num,$id,$verify);
    $result->store_result();
    if($result->fetch()) {

        $_SESSION['login_user'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['number'] = $num;
        $_SESSION['user_id'] = $id;
        $_SESSION['verify'] = $verify;

        header("Location:$url");
    }else {

        header("Location:$url?login=false");
    }

?>
