<?php 
require_once '../conf/conn.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$rpid = $_POST['pid'];
$rin = $_POST['name'];
$rip = $_POST['price'];
$rit = $_POST['type'];
$rid = $_POST['download'];
$riu = $_POST['upload'];
$riv = $_POST['device'];
$rir = $_POST['duration'];
$ric = $_POST['description'];

  $sql_update = "UPDATE package set `name`= '$rin',`price`= '$rip',`type`= '$rit',`s_download`= '$rid',`s_upload`= '$riu',`total_devices`= '$riv',`duration_days`= '$rir',`description`= '$ric' where id = '$rpid' ";

  $stmt = $linkcnm->prepare($sql_update);
  $stmt->execute();

  if ($stmt) 
  {
    echo "<script>Edit News Success');</script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;

  }
  else{
    echo "<script>Something when wrong...');</script>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
  }

}
?>