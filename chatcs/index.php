<!DOCTYPE html>
<html>
 <head>
  <script src="jquery.min.js"></script>
  <script src="chat.js"></script>
  <link href="chat.css" rel="stylesheet"/>
  <?php echo '<link href="http://'.$_SERVER['HTTP_HOST'].'/xradius/crossradius-admin/assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">'; ?>
 </head>
 <body>
  
	<div id="konten">
    <div class="container">

      <a href="../admin?page=cs" class="mya">
        <p><i class="fa fa-sign-out fa-2x prefix text-danger" aria-hidden="true"></i> </p>
      </a>
      <a href="../admin?page=cs" class="myb">
        <!-- <i class="fa fa-sign-out fa-2x prefix text-danger" aria-hidden="true"></i> -->
        <?php echo '<img class="navbar-brand" src="http://'.$_SERVER['HTTP_HOST'].'/xradius/crossradius-admin/assets/img/xspin.gif" alt="XNET Logo" height="60">'; ?>
      </a>
      
      <!-- <a href="../admin?page=cs" class="myc"> 
        <i class="fa fa-user-circle prefix text-danger" aria-hidden="true"></i> Username
      </a> -->

      <br>

      <p style="margin-top:80px"></p>




    </div>
    
	
   <div class="chat">
  
     <?php 
      error_reporting(0);
    //  $_GET['uid'];
    //  $_GET['csid'];
    //  $uidnya =  $_GET['uid'];
    //  $csidnya = $_GET['csid'];

	 //include("config.php");
   require_once("../conf/safety.php");
   $_SESSION["fromuid"] = $_GET['uid'];;
   echo $_SESSION['email'];
   echo $_SESSION['fromuid'];
   
   include("login.php");

      include("chatbox.php");

     ?>
   </div>
   <div class="users" style='display:none'>
     <?php //include("users.php");?>
    </div>
    <!-- <button class="mybtn" onclick="topFunction()" id="myBtn" title="Go to top">Top</button> -->
	</div>
 </body>
</html>
