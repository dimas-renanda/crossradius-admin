<?php
require_once 'conf/conn.php';
//require_once 'conf/safety.php';
$domainnya = $_SERVER['HTTP_HOST'];
error_reporting(E_ALL);
ini_set('display_errors', 1);
$_POST["username"];
$_POST["password"];
 
    $ch = curl_init();
    $emailnya = @$_POST["username"];
    $passnya = @$_POST["password"];

    $hashed = hash("sha512", $passnya);

    $url  = "http://116.68.252.198:38600/login?email=$emailnya&password=$hashed";

    $homepage = file_get_contents($url);

    $jsonArrayResponse = json_decode($homepage,true);

if ($jsonArrayResponse["Message"] == "Login Success")
{
    $getsql = "SELECT id from user where email = '$emailnya'";
$stmt = $linkcnm->prepare($getsql);
$stmt->execute();
$hasil = $stmt->get_result();
$row = $hasil->fetch_assoc();

    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $emailnya;
    $_SESSION["idnya"] =  $row['id'];
    echo '<script type="text/javascript">window.location.href="http://'.$domainnya.'/xradius/crossradius-admin/dashboard";</script>';
}
else
{
    echo '<script type="text/javascript">alert("'.$domainnya.'Login Gagal !");window.location.href="http://'.$domainnya.'/xradius/crossradius-admin";</script>';
}


?>
