<?php 
session_start();
unset($_SESSION["isrouter"]);
unset($_SESSION["iprouter"]);
unset($_SESSION["usernamerouter"]);
unset($_SESSION["pwdrouter"]); 

header("../dashboard");
?>