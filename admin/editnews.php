<?php 
require_once '../conf/conn.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{

$ri = $_POST['id'];
$rt = $_POST['title'];
$rd = $_POST['description'];
$ru = $_POST['url'];
$rgmb = $_POST['timg'];

  // tentukan lokasi file akan dipindahkan
  $dirUpload = "uploads/img/";
  $dirfilenya = "uploads/img/$rgmb";
//echo $ri,$rt,$rd,$ru;
$temp = explode(".", $_FILES["filefoto"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$allowed_extensions = array(".jpg",".JPG","jpeg","JPEG",".png",".PNG");
$extension = substr($newfilename,strlen($newfilename)-4,strlen($newfilename));

//var_dump($_FILES["filefoto"]["name"]);
//echo "<br>";
if (empty($_FILES["filefoto"]["name"]))
{
  $sql_update = "UPDATE news set `title`= '$rt', `description`='$rd' ,`url`='$ru' where id = '$ri' ";
  //echo "kosongg", $_FILES["filefoto"]["name"] , "kosongg <br> Tidak Mengganti Fotoo yang adaa.....";
}
elseif(!empty($_FILES["filefoto"]["name"]))
{
  $sql_update = "UPDATE news set `title`= '$rt', `description`='$rd' ,`img`='".$newfilename."',`url`='$ru' where id = '$ri' ";
  //echo "adaaa", $_FILES["filefoto"]["name"] , "adaaaa";
  unlink("$dirfilenya");
  $terupload = move_uploaded_file($_FILES["filefoto"]["tmp_name"], $dirUpload . $newfilename);  
  if(!in_array($extension,$allowed_extensions) || $_FILES["filefoto"]["size"] > 2000000)
  {
    
    echo "<script>alert('Mohon Upload Tipe Data Image (jpg,jpeg,png) dan ukuran file < 2MB');</script>";
  }

  else
  {
	//echo '<div id="loader"></div>';
    
  }

}

  $stmt = $linkadmincnm->prepare($sql_update);
  $stmt->execute();
  //echo mysqli_error($linkadmincnm);

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