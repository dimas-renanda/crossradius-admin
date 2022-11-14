<?php 
require_once '../conf/conn.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
//$rpid = $_POST['pid'];
$rin = $_POST['name'];
$rip = $_POST['price'];
$rit = $_POST['type'];
$rid = $_POST['download'];
$riu = $_POST['upload'];
$riv = $_POST['device'];
$rir = $_POST['duration'];
$ric = $_POST['description'];

//echo $ri,$rt,$rd,$ru;

  $sql_update = "INSERT INTO package (name,price,type,s_download,s_upload,total_devices,duration_days,description,isdeleted) VALUES ('$rin','$rip','$rit','$rid','$riu','$riv','$rir','$ric',0)";
  //echo "kosongg", $_FILES["filefoto"]["name"] , "kosongg <br> Tidak Mengganti Fotoo yang adaa.....";




  $stmt = $linkcnm->prepare($sql_update);
  $stmt->execute();
  //echo mysqli_error($linkadmincnm);
echo $sql_update;
  //echo $dirfilenya;
  // if ($stmt) 
  // {
  //   echo "<script>Edit News Success');</script>";
  //   header('Location: ' . $_SERVER['HTTP_REFERER']);
  //           exit;

  // }
  // else{
  //   echo "<script>Something when wrong...');</script>";
  //   header('Location: ' . $_SERVER['HTTP_REFERER']);
  //           exit;
  // }

}
?>