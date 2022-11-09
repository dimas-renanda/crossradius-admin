<?php 
require_once '../conf/conn.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$rpid = $_POST['pid'];


//echo $ri,$rt,$rd,$ru;

  $sql_update = "UPDATE package set `isdeleted`= 1 where id = '$rpid' ";
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