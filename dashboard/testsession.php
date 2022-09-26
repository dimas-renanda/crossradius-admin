<?php 

require_once "../conf/bjorka.php";
session_start();
echo($_SESSION["isrouter"]);
echo "<br>";
echo($_SESSION["iprouter"]);
echo "<br>";
echo($_SESSION["usernamerouter"]);
echo "<br>";
echo($_SESSION["pwdrouter"]); 


echo "<br>";
echo findbjorka($_SESSION["iprouter"],$key,"base64");
echo "<br>";
echo findbjorka($_SESSION["usernamerouter"],$key,"base64");
echo "<br>";
echo findbjorka($_SESSION["pwdrouter"],$key,"base64"); 

?>