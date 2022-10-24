<?php
$domainnya = $_SERVER['HTTP_HOST'];
error_reporting(E_ALL);
ini_set('display_errors', 1);
$_POST["username"];
$_POST["password"];
 

//Method GET
    // $ch = curl_init();
     $emailnya = @$_POST["username"];
     $passnya = @$_POST["password"];

     $hashed = hash("sha512", $passnya);

    $url  = "http://10.10.10.232:38900/AdminLogin?email=$emailnya&password=$hashed";


    $homepage = file_get_contents($url);
    var_dump($homepage);
    $jsonArrayResponse = json_decode($homepage,true);



//echo $jsonArrayResponse["Message"];

// //Method POST
// // API URL
// $url = 'http://10.10.10.148:38900/AdminLogin';

// // Create a new cURL resource
// $ch = curl_init($url);

// // Setup request to send json via POST
// $data = array(
//     'email' => $emailnya,
//     'password' => $hashed
// );
// $payload = json_encode(array("data" => $data));

// // Attach encoded JSON string to the POST fields
// curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

// // Set the content type to application/json
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// // Return response instead of outputting
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// // Execute the POST request
// $result = curl_exec($ch);

// // Close cURL resource
// curl_close($ch);

// var_dump($result);


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
   // echo '<script type="text/javascript">alert("'.$domainnya.'Login Gagal !");window.location.href="http://'.$domainnya.'/xradius/crossradius-admin";</script>';
}


?>
