<?php 
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

    // get active hotspot info
    $counthotspotactive = $API->comm("/ip/hotspot/active/print");

      $jsonac = json_encode($counthotspotactive);

      $resultac = json_decode($jsonac, true);

            // get hotspot log
  $getlog = $API->comm("/log/print", array("?topics" => "hotspot,info,debug", ));
  $log = array_reverse($getlog);
  $THotspotLog = count($getlog);

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

// var_dump ($routerboard);

// echo "<br> ==================================================== <br>";


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

// echo "<br> ==================================================== <br>";

// var_dump ($resource);

// echo "<br> ==================================================== <br>";

// echo "<h3>R Date</h3>";
// echo "<br> ==================================================== <br>";
// echo 'System date & time ';
// echo "<br> ==================================================== <br>";
// echo $resource["build-time"];
// echo "<br> ==================================================== <br>";
// echo 'Uptime : ',$resource["uptime"];



// echo "<br> ==================================================== <br>";

// echo "<h3>R INFO</h3>";
// echo "<br> ==================================================== <br>";
// echo 'Board Arch : ',$resource["architecture-name"];
// echo "<br> ==================================================== <br>";
// echo 'Model : ',$resource["board-name"];
// echo "<br> ==================================================== <br>";
// echo 'Router OS : ',$resource["version"];


// echo "<br> ==================================================== <br>";
// echo "<h3>R USAGE</h3>";
// echo "<br> ==================================================== <br>";
// echo 'CPU Load : ',$resource["cpu-load"],'%';
// echo "<br> ==================================================== <br>";
// echo 'Free Memory : ',bcdiv($resource["free-memory"], 1048576, 2),' MiB';
// echo "<br> ==================================================== <br>";
// echo 'Free HDD : ',bcdiv($resource["free-hdd-space"], 1048576, 2),' MiB';
// echo "<br> ==================================================== <br>";








// echo count($result);

 //var_dump($response);

 //var_dump($log);
//  var_dump( $log);
//  echo "<br>";
//  var_dump( $log[0]);
//  echo "<br>";

//  $logvar = $log[0];
// echo  $logvar['time'];
// echo "<br>";
// echo  $logvar['message'];
// echo "<br>";
echo '<table class="table table-bordered table-striped text-center">
<thead>
<tr>
  <th scope="col">Time</th>
  
  <th scope="col">IP</th>
  <th scope="col">Messages</th>
</tr>
</thead>
<tbody>';
foreach ($log as $llog)
{
    foreach ($llog as $vlog)
    {

        echo '<tr>';
        echo '<th scope="row">'.$llog['time'].'</th>';
        echo '<td>'.strtok($llog['message'],':').'</td>
        <td>'.substr($llog['message'], strpos($llog['message'], ":") + 1).'</td>';
      echo'</tr>';
    }
   
}


echo       '</tbody>
</table>';


?>