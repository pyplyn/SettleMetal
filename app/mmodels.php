<?php
$_POST=json_decode(file_get_contents('php://input'), true);
require '../config.php';
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
if(!empty($_POST['device_id']) and isset($_POST['device_id']))
{
  $devices_id=$_POST['device_id'];

  $sql = "SELECT model_id, model_name, device, image_m, category_id from models where device = ? ";
  $result = $db->prepare($sql);
  $result->bind_param('i',$devices_id);
  $output=array();
  if($result->execute())
  {
    $result->bind_result($model_id,$model_name,$device,$image_m,$category_id);
    $result->store_result();
    while($result->fetch())
    {
      $output[] = array('model_id' => $model_id, 'model_name' => $model_name , 'device' => $device,'image_m' => $image_m,'category_id' => $category_id );
    }
    echo json_encode($output);
  }
  else{
      echo "null";
  }
}
?>
