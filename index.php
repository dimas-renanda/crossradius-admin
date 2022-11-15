<?php
require_once "conf/headhtml.php";
require_once "conf/conn.php";
session_start();




$ip = $_SERVER["REMOTE_ADDR"];

$getsql = "SELECT COUNT(*) FROM `ip` WHERE `address` LIKE '$ip' AND `timestamp` > (now() - interval 10 minute)";

$stmt = $linkadmincnm->prepare($getsql);
$stmt->execute();
$hasil = $stmt->get_result();
$row = $hasil->fetch_assoc();




$count = $row['COUNT(*)'];

echo "Accessed from : xxxxx",substr($ip,5),'<br>';

echo "Attempts : ",$count,'<br>';


if($count > 3){
  echo "Max Limit Attempts in 10 minutes";
}
elseif($count == 2)
{
  echo "Warning Last Attempt Before Limit";
}
elseif($count < 3)
{
$getsql = "DELETE FROM `ip` WHERE `address` LIKE '$ip' AND `timestamp`  < (NOW() - INTERVAL 10 MINUTE)";
$stmt = $linkadmincnm->prepare($getsql);
$stmt->execute();
}


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ./dashboard");
  exit;
}

?>
<div style="padding-top: 5%;"  class="login-box">
  <div class="card">
    <div class="card-body">
      <div class="text-center pd-5">
        <img src="assets/img/NEWCNM.gif" height="80" alt="XNET Logo">
      </div>
      <div  class="text-center">
      <span style="font-size: 20px; margin: 10px;"> Network Management</span>
      <br>
      <br>
      </div>
      <center>
      <form autocomplete="off" action="signin.php" method="post">
      <table class="table" style="width:90%">
        <tr>
          <td class="align-middle text-center">
            <input style="width: 100%; height: 35px; font-size: 16px;" class="form-control" type="text" name="username" id="_username" placeholder="Username" required="1" autofocus>
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <input style="width: 100%; height: 35px; font-size: 16px;" class="form-control" type="password" name="password" placeholder="Password" required="1">
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <?php 
            if($count >= 3){
              echo "<i class='text-danger'> Try again in 10 minutes !</i>";
              echo '<button style="width: 100%; margin-top:20px; height: 35px; font-weight: bold; font-size: 17px;" class="btn-login bg-danger" type="button" disabled ><i class="fa fa-warning"></i> Max Limit</button>  ';
            }
            elseif ($count < 3)
            {
              echo ' <input style="width: 100%; margin-top:20px; height: 35px; font-weight: bold; font-size: 17px;" class="btn-login bg-primary pointer" type="submit" name="login" value="Login">';
            }
            ?>
          </td>
        </tr>
        <tr>
          <td class="align-middle text-center">
            <?= $error; ?>
          </td>
        </tr>
      </table>
      </form>
      </center>
    </div>
  </div>
</div>
</body>
</html>
