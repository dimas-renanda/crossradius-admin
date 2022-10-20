<?php 

$json = file_get_contents('http://phoenix.crossnet.co.id:38600/GetCSRequest');
$datanya = json_decode($json,true);

        foreach ($datanya["Data"] as $data) {
         $datasend[] = $data;
    }
    echo json_encode(array("result" => $datasend));
?>