<?php
require_once "conf/headhtml.php";
require_once "conf/conn.php";
session_start();
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
            <input style="width: 100%; margin-top:20px; height: 35px; font-weight: bold; font-size: 17px;" class="btn-login bg-primary pointer" type="submit" name="login" value="Login">
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
