<?php 
require('../conf/connrouter.php'); $API = new RouterosAPI(); //$API->debug = true;

@$_GET["router"];
@$_GET["username"];
@$_GET["uidrouter"];
@$_GET["pwdrouter"];

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
	
	

    //header('../');
}

?>