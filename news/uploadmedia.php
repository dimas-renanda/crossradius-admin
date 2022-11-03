<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{

$temp = explode(".", $_FILES["filefoto"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);
$allowed_extensions = array(".jpg",".JPG","jpeg","JPEG",".png",".PNG");
$extension = substr($newfilename,strlen($newfilename)-4,strlen($newfilename));

  // tentukan lokasi file akan dipindahkan
  $dirUpload = "uploads/id/";

  $sql_update = "UPDATE users set identitas =  '".$newfilename."' WHERE id = $id_user";
  if(!in_array($extension,$allowed_extensions) || $_FILES["filefoto"]["size"] > 2000000)
  {
    
    echo '<div id="loader"></div>';

    echo "<script>alert('Mohon Upload Tipe Data Image (jpg,jpeg,png) dan ukuran file < 2MB');</script>";
 
  }
  else
  {
	echo '<div id="loader"></div>';
    $terupload = move_uploaded_file($_FILES["filefoto"]["tmp_name"], $dirUpload . $newfilename);  
  }
  if ($terupload) {

  }
}
?>