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


foreach($routerboard as $data)
{
    echo $data;
    echo "<br>";
}

echo "===================================";
echo "<br>";

foreach($resource as $data)
{
    echo $data;
    echo "<br>";
}

echo "<br>";


echo $routerboard["model"];





// echo count($result);

 //var_dump($response);
?>