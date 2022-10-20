<?php 
include "phpqrcode/qrlib.php";

$isi = 'http://phoenix.crossnet.co.id'; 
 
QRcode::png($isi); 
?>