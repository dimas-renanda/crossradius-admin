<?php 
include("config.php");
// if(!isset($_SESSION['user']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
//  die("<script>window.location.reload()</script>");
// }
if(isset($_POST['msg'])){
 $msg=htmlspecialchars($_POST['msg']);
 if($msg!=""){
    // http://phoenix.crossnet.co.id:38600/AddChat?uid=10&csid=22&chat=Terimakasih&timestamp=date()&sent_by=CS
//   $sql=$dbh->prepare("INSERT INTO messages (name,msg,posted) VALUES (?,?,NOW())");
//   $sql->execute(array($_SESSION['user'],$msg));

$url = 'http://phoenix.crossnet.co.id:38600/AddChat';
$data = array('uid' => $_SESSION['fromuid'],
              'csid'=> $_SESSION['idnya'],
              'chat'=> $msg,
             'timestamp' => $today = date("Y-m-d H:i:s"),
            'sent_by' => 'CS'   );

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

//var_dump($result);
	

//     header('Location: ' . $_SERVER['HTTP_REFERER']);
// exit;
	

//     header('Location: ' . $_SERVER['HTTP_REFERER']);
// exit;

 }
}
?>
