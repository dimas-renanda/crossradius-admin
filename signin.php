<?php
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
    var_dump($homepage);
    $jsonArrayResponse = json_decode($homepage,true);



//echo $jsonArrayResponse["Message"];


if ($jsonArrayResponse["Message"] == "Login Success")
{
    //echo "Login Berhasil";
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $emailnya;
    echo '<script type="text/javascript">alert("Login Berhasil !");window.location.href="http://'.$domainnya.'/xradius/crossradius-admin/dashboard";</script>';
    //header("location: index.php");
}
else
{
    //echo "Login Gagal";
    echo '<script type="text/javascript">alert("'.$domainnya.'Login Gagal !");window.location.href="http://'.$domainnya.'/xradius/crossradius-admin";</script>';
}


?>
