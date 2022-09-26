<?php 
require_once "../assets/assets.php";
require_once "../conf/connrouter.php";
require_once "../conf/bjorka.php";
session_start();



$API = new RouterosAPI();
$API->debug = false;
if($API->connect( findbjorka($_SESSION["iprouter"],$key,"base64"), findbjorka($_SESSION["usernamerouter"],$key,"base64"), findbjorka($_SESSION["pwdrouter"],$key,"base64")))
{

// get MikroTik system clock
    $getclock = $API->comm("/system/clock/print");
    $clock = $getclock[0];
    $timezone = $getclock[0]['time-zone-name'];
    date_default_timezone_set($timezone);

// get system resource MikroTik
    $getresource = $API->comm("/system/resource/print");
    $resource = $getresource[0];

// get routeboard info
    $getrouterboard = $API->comm("/system/routerboard/print");
    $routerboard = $getrouterboard[0];

    $counthotspotactive = $API->comm("/ip/hotspot/active/print");

      $json = json_encode($counthotspotactive);

      $result = json_decode($json, true);


}

// foreach ($result as $data)
// {
//     echo '<tr><th scope="row">',$data['user'],'<th>';
// }

// $jsone = json_encode("http://10.10.10.196:38700/GetAllUsers");
// $hasil = json_decode($jsone, true);

// var_dump($hasil);




// $json = file_get_contents('http://10.10.10.196:38700/GetAllUsers');

// $datanya = json_decode($json,true);


// echo "<pre>";

// //print_r($datanya["Data"]);
// $cnt = 0;

// foreach($datanya["Data"] as $data)
// {
//     foreach ($data as $datanyo)
//     {
//         $cnt += 1;
//         echo $datanyo;
//         echo "<br>";
//     }
// }

// echo $cnt;
// echo "<br>";

var_dump ($routerboard);

echo "<br> ==================================================== <br>";


// foreach($routerboard as $data)
// {
//     echo $data;
//     echo "<br>";
// }

// echo "===================================";
// echo "<br>";

// foreach($resource as $data)
// {
//     echo $data;
//     echo "<br>";
// }

// echo "<br>";

echo "<br> ==================================================== <br>";

var_dump ($resource);

echo "<br> ==================================================== <br>";

echo "<h3>R Date</h3>";
echo "<br> ==================================================== <br>";
echo 'System date & time ';
echo "<br> ==================================================== <br>";
echo $resource["build-time"];
echo "<br> ==================================================== <br>";
echo 'Uptime : ',$resource["uptime"];



echo "<br> ==================================================== <br>";

echo "<h3>R INFO</h3>";
echo "<br> ==================================================== <br>";
echo 'Board Arch : ',$resource["architecture-name"];
echo "<br> ==================================================== <br>";
echo 'Model : ',$resource["board-name"];
echo "<br> ==================================================== <br>";
echo 'Router OS : ',$resource["version"];


echo "<br> ==================================================== <br>";
echo "<h3>R USAGE</h3>";
echo "<br> ==================================================== <br>";
echo 'CPU Load : ',$resource["cpu-load"],'%';
echo "<br> ==================================================== <br>";
echo 'Free Memory : ',bcdiv($resource["free-memory"], 1048576, 2),' MiB';
echo "<br> ==================================================== <br>";
echo 'Free HDD : ',bcdiv($resource["free-hdd-space"], 1048576, 2),' MiB';
echo "<br> ==================================================== <br>";








// echo count($result);

 //var_dump($response);
?>