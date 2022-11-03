<?php 
$domainnya = $_SERVER['HTTP_HOST'];
$linkcnm = mysqli_connect("phoenix.crossnet.co.id","user","xyz13juli","cnm");

//check connection
if ($linkcnm === false)
{
    die("ERROR : Could not connect. ".mysqli_connect_error());
    
}

$linkadmincnm = mysqli_connect("phoenix.crossnet.co.id","user","xyz13juli","admin_cnm");

//check connection
if ($linkadmincnm === false)
{
    die("ERROR : Could not connect. ".mysqli_connect_error());
    
}

// $linkrad = mysqli_connect("192.168.1.242","user","xyz13juli","radius");

// //check connection
// if ($linkrad === false)
// {
//     die("ERROR : Could not connect. ".mysqli_connect_error());
    
// }



?>


<!-- Pace Loading Line animation -->
<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@1.2.4/themes/blue/pace-theme-flash.css">