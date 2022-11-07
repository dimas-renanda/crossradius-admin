<?php 
require_once '../conf/conn.php';
require_once "../conf/safety.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
{

// $ri = $_POST['uid'];

//echo $ri,$rt,$rd,$ru;

//   $sql_update = "UPDATE ticketing set `status`= 'Finished' where id = '$ri' ";
//   //echo "kosongg", $_FILES["filefoto"]["name"] , "kosongg <br> Tidak Mengganti Fotoo yang adaa.....";




//   $stmt = $linkcnm->prepare($sql_update);
//   $stmt->execute();
//   //echo mysqli_error($linkadmincnm);
// //echo $sql_update;
//   //echo $dirfilenya;
//   if ($stmt) 
//   {
//     echo "<script>Edit News Success');</script>";
//     header('Location: ' . $_SERVER['HTTP_REFERER']);
//             exit;

//   }
//   else{
//     echo "<script>Something when wrong...');</script>";
//     header('Location: ' . $_SERVER['HTTP_REFERER']);
//             exit;
//   }

  $url = 'http://phoenix.crossnet.co.id:38600/EndChat';
$data = array(
  'uid' => $_POST['uid'],
  'csid' => $_SESSION['idnya']
 );

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'PUT',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

echo $_POST['uid'],'<br>';
echo $_SESSION['idnya'],'<br>';
var_dump($result);
	

//     header('Location: ' . $_SERVER['HTTP_REFERER']);
// exit;
	

//     header('Location: ' . $_SERVER['HTTP_REFERER']);
// exit;

}
?>