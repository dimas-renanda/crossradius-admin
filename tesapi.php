<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
$jsonmoney = file_get_contents('http://10.10.10.232:38700/GetPayments');

$totmoney = json_decode($jsonmoney,true);
        $alluser = count($totmoney["Data"]);
// echo($totmoney['Data'][0]['Id']);

$resulttotalmoney = 0;
foreach (@$totmoney as $to)
{
    foreach(@$to as $total)
    {
        $resulttotalmoney += $total['Amount'];
        echo $total['Amount'];
        echo "<br>";
    };
}


echo rupiah($resulttotalmoney);
?>