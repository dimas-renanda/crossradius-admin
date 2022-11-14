<?php 
require_once '../conf/conn.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{

$ri = $_POST['sid'];
$rs = $_POST['topic'];
$rd = $_POST['description'];

$sql_update = "SELECT user_id from user_package where sid = '$ri' ";

$stmt = $linkcnm->prepare($sql_update);
$stmt->execute();
$hasil = $stmt->get_result();
$row = $hasil->fetch_assoc();
$today = date("d-m-Y");
$schedulenya = date("d-m-Y",strtotime("+3 day") );
$uidnye = $row['user_id'];

$sql_update = "INSERT INTO ticketing (id_user,sid,date_created,created_by,topic,description,status,time_schedule,detail) VALUES ('$uidnye','$ri','$today','CS','$rs','','Waiting','$schedulenya','$rd')";

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