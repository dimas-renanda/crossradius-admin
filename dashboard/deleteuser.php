<?php 
require('../conf/connrouter.php');
require_once "../conf/bjorka.php";
 $API = new RouterosAPI(); //$API->debug = true;

$_GET["router"];
$_GET["uidrouter"];
$_GET["pwdrouter"];
$_GET["username"];

echo findbjorka($_GET["router"],$key,"base64");
echo "<br>";
echo findbjorka($_GET["username"],$key,"base64");
echo "<br>";
echo findbjorka($_GET["uidrouter"],$key,"base64");
echo "<br>";
echo findbjorka($_GET["pwdrouter"],$key,"base64");
echo "<br>";


if ($API->connect($_GET["router"],$_GET["uidrouter"], $_GET["pwdrouter"])) {

	$username =@$_GET["username"];
	$id_active = false;
	$id_cookie = false;
   
	$API->write('/ip/hotspot/cookie/print');
   	$cookie = $API->read();
	foreach($cookie as $row) if ($row['user'] == $username) $id_cookie = $row['.id'];
	
	$API->write('/ip/hotspot/active/print');
   	$active = $API->read();
	foreach($active as $row) if ($row['user'] == $username) $id_active = $row['.id'];
	
	$API->write('/ip/hotspot/cookie/remove', false);
	$API->write('=.id='.$id_cookie);
	$READ = $API->read();
	print_r($READ);
	
	
	$API->write('/ip/hotspot/active/remove', false);
	$API->write('=.id='.$id_active);
	$READ = $API->read();
	print_r($READ);
	
	$url = 'http://10.10.10.232:38900/DeleteUser';
$data = array('username' => $_GET['username'] );

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

var_dump($result);
	

    header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
}



?>