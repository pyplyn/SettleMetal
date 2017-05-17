<?php
$_POST=json_decode(file_get_contents('php://input'), true);
require '../config.php';
$db = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE) OR DIE(mysqli_connect_errno());
if(!empty($_POST['model_id']) and isset($_POST['model_id']))
{
  $model_id=$_POST['model_id'];

  $sql = "SELECT s.service_id,p.price,s.service_name,s.image_s,p.price_id FROM price p INNER JOIN services s ON p.service_id=s.service_id WHERE model_id=?";
  $result = $db->prepare($sql);
  $result->bind_param('i',$model_id);
  $output=array();
  if($result->execute())
  {
    $result->bind_result($serviceid,$price,$servicename,$images,$priceid);
    $result->store_result();
    while($result->fetch())
    {
      $output[] = array('service_id' => $serviceid, 'price' => $price , 'service_name' => $servicename,'image_s' => $images,'price_id' => $priceid );
    }
    echo json_encode($output);
  }
  else{
      echo "null";
  }
}
?>
