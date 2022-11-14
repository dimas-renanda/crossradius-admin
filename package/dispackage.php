<?php 
require_once '../conf/conn.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$rpid = $_POST['pid'];
  $sql_update = "UPDATE package set `isdeleted`= 1 where id = '$rpid' ";
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