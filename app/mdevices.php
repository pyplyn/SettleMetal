<?php
$_POST=json_decode(file_get_contents('php://input'), true);
require '../config.php';
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
if(!empty($_POST['category_id']) and isset($_POST['category_id']))
{
  $category_id=$_POST['category_id'];

  $sql = "SELECT device_id, device_name, category_id, image from devices where category_id = ? ";
  $result = $db->prepare($sql);
  $result->bind_param('i',$category_id);
  $output=array();
  if($result->execute())
  {
    $result->bind_result($device_id,$device_name,$category_id,$image);
    $result->store_result();
    while($result->fetch())
    {
      $output[] = array('device_id' => $device_id, 'device_name' => $device_name , 'category_id' => $category_id,'image' => $image );
    }
    echo json_encode($output);
  }
  else{
      echo "null";
  }
}
?>
