<?php 
require_once '../conf/conn.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{

$ri = $_POST['tid'];
$rti = $_POST['time'];
$rs = $_POST['status'];
$rd = $_POST['detail'];

//echo $ri,$rt,$rd,$ru;
if(!empty($rd))
{
  $sql_update = "UPDATE ticketing set `status`= '$rs',`time_schedule`= '$rti',`detail`= '$rd' where id = '$ri' ";
}
elseif(empty($rd))
{
  $sql_update = "UPDATE ticketing set `status`= '$rs',`time_schedule`= '$rti' where id = '$ri' ";
}

  //echo "kosongg", $_FILES["filefoto"]["name"] , "kosongg <br> Tidak Mengganti Fotoo yang adaa.....";




  $stmt = $linkcnm->prepare($sql_update);
  $stmt->execute();
  //echo mysqli_error($linkadmincnm);
//echo $sql_update;
  //echo $dirfilenya;
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