<?php 
require_once "../conf/safety.php";


$url = "http://10.10.10.148:38900/CreateNewProfile";
$data = array(
    'profileName' => $_POST['profileName'],
    'profileAttribute' => $_POST['profileAttribute'],
    'profileOperator' => $_POST['profileOperator'],
    'profileValue' => $_POST['profileValue'],
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