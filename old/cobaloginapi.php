<?php
$_POST["username"];
$_POST["password"];

    $ch = curl_init();
    $emailnya = $_POST["username"];
    $passnya = $_POST["password"];
    echo $emailnya;
    echo $passnya;
    //$emailnya ="damson";
    //$passnya ="d7cc71ade304eadc9dbb42421cf1a389418e71ec7b33b5b75c13f610caa476eea0564723d6455efb58eb7a16c7003cb99e42d4735a82a6d6b0834998362bddb3";
    $url  = "http://10.10.10.196:38600/login?email=$emailnya&password=$passnya";
    curl_setopt($ch, CURLOPT_URL,$url);
     curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    //curl_setopt($ch, CURLOPT_POSTFIELDS,$postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    echo $server_output;
    curl_close ($ch);
    $jsonArrayResponse = json_decode($server_output,true);
    var_dump( $jsonArrayResponse);

//    foreach($jsonArrayResponse['Message'] as $pss_json)
//    {
   
//        echo '<br>' .$course_data1 = $pss_json['course_data1']; exit; 
   
//    }
echo $jsonArrayResponse["Message"];
if ($jsonArrayResponse["Message"] == "Login Success")
{
    //echo "Login Berhasil";
    session_start();
    $_SESSION["loggedin"] = true;
    $_SESSION["email"] = $emailnya;
    echo '<script type="text/javascript">alert("Login Berhasil")</script>';
    //header("location: index.php");
}
else
{
    echo "Login Gagal";
}


?>