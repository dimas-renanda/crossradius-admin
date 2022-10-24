<?php 
require_once "../conf/safety.php";


$url = "http://10.10.10.232:38900/CreateNewUser";
$data = array(
    'userCredentials' => $_POST['userCredentials'],
    'profileName' => $_POST['profileName'],
    'sessionTimeout' => $_POST['sessionTimeout'],
    'idleTimeout' => $_POST['idleTimeout'],
    'expiredDate' => $_POST['expiredDate'],
    'deviceOwner' => $_POST['deviceOwner'],
    'deviceInfo' => $_POST['deviceInfo'],
 );

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }
var_dump($data);
var_dump($result);
	

    header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;




?>