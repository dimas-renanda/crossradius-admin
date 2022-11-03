<?php 
include("config.php");
$linkcnm = mysqli_connect("localhost","user","xyz13juli","cnm");

//check connection
if ($linkcnm === false)
{
    die("ERROR : Could not connect. ".mysqli_connect_error());
    
}
$uudnya = $_SESSION["fromuid"];
$json = file_get_contents("http://phoenix.crossnet.co.id:38600/GetChat?uid=$uudnya");
$datanya = json_decode($json,true);
// $sql=$dbh->prepare("SELECT * FROM messages");
// $sql->execute();
//var_dump($datanya);
foreach($datanya['Data'] as $r){
  $uid = $r['UID'];
  $getsql = "SELECT first_name from user where id = $uid  ";
  $stmt = $linkcnm->prepare($getsql);
  $stmt->execute();
  $hasil = $stmt->get_result();
  $row = $hasil->fetch_assoc();
  //var_dump($row);
	if($r['SentBy'] == "CS")
  {
		$aktip = "bubble-right";
	}else{
    
		$aktip = "bubble-left";
	}
 echo "<div class='urltag $aktip'>
 <p>
 <span class='name'>
 {$row['first_name']}</span><span class='msgc'>".urlf($r['Chat'])."
 </span>
 <span class='dat'>{$r['Timestamp']}</span>
 </p>
 </div>";
}
// if(!isset($_SESSION['user']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
//  echo "<script>window.location.reload()</script>";
// }

   function urlf($text){
      $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
     preg_match_all($reg_exUrl, $text, $matches);
     $usedPatterns = array();
     foreach($matches[0] as $pattern){
       if(!array_key_exists($pattern, $usedPatterns)){
         $usedPatterns[$pattern]=true;
         $text = str_replace  ($pattern, '<a href="'.$pattern.'" rel="nofollow">'.$pattern.'</a> ', $text);   
       }
     }
     return $text;
   }
   

?>
