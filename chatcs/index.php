<!DOCTYPE html>
<html>
 <head>
  <script src="jquery.min.js"></script>
  <script src="chat.js"></script>
  <link href="chat.css" rel="stylesheet"/>
 </head>
 <body>
  
	<div id="konten">
 <?php //require_once '../assets/assets.php' ?>
    <div class="container"><button>Exit</button><br><p style="margin-top:80px"></p></div>
    
	
   <div class="chat">
  
     <?php 
    //  $_GET['uid'];
    //  $_GET['csid'];
    //  $uidnya =  $_GET['uid'];
    //  $csidnya = $_GET['csid'];

	 include("config.php");
   $_SESSION["fromuid"] = $_GET['uid'];;
   echo $_SESSION['email'];
   echo $_SESSION['fromuid'];
   
   include("login.php");

      include("chatbox.php");

     ?>
   </div>
   <div class="users" style='display:none'>
     <?php include("users.php");?>
    </div>
	</div>
 </body>
</html>
