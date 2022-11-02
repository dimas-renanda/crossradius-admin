<?php
/*
 *  Copyright (C) 2018 Laksamadi Guko.
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once "conf/headhtml.php";
require_once "conf/conn.php";
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ./dashboard");
  exit;
}

//session_start();

?>



<div style="padding-top: 5%;"  class="login-box">
  <div class="card">
    <!-- <div class="card-header">
      <h3><?= $_please_login ?></h3>
    </div> -->
    <div class="card-body">
      <div class="text-center pd-5">
        <img src="assets/img/xnet.png" height="60" alt="XNET Logo">
      </div>
      <div  class="text-center">
      <b><span style="font-size: 25px; margin: 10px;">MikroX</span></b>
      </div>
      <center>
        <?php //require_once "signin.php"; ?>
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

<!-- <div class="container">
  <div class="card">
    <div class="card-header">
    <h1>Hello World</h1>
    </div>
    <div class="card-body">
      <p>halo ges ini card</p>
    </div>
  </div>
</div> -->

</body>
</html>
