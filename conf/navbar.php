<?php require_once'../conf/conn.php';    ob_start();
error_reporting(0);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="">
  &nbsp;
      <?php echo '<img class="navbar-brand" src="http://'.$domainnya.'/xradius/crossradius-admin/assets/img/xnet.png" alt="XNET Logo" height="40">'; ?>
      CNM </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
          <!-- <li class="nav-item active">
           
            <a class="nav-link" href="../dashboard/cobadash.php"> Dashboard<span class="sr-only"></span></a>
          </li> -->

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-cogs"></i> Admin
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <!-- <li>
                        <a class="dropdown-item" href="Guest_loc.php">Count Guest Based Location</a>
                      </li> -->
                      <li>
                      <a class="dropdown-item" href="../news"><i class="fa fa-newspaper-o"></i> News<span class="sr-only"></span></a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="../CS/"><i class="fa fa-comments-o" aria-hidden="true"></i> Customer Services</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="../ticket/"><i class="fa fa-user-times" aria-hidden="true"></i> Ticketing</a>
                      </li>

              </ul>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li> -->
          <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Insert Data
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li>
                        <a class="dropdown-item" href="room_insert.php">Hotspot</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="hotel_insert.php">PPOE</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="booking_insert.php">Traffic</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="country_insert.php">Transaction</a>
                      </li>
              </ul>
          </li> -->

          <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                View Data
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li>
                        <a class="dropdown-item" href="hotel_view.php">View Hotel</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="room_view.php">View Room</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="booking_view.php">View Booking</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="country_view.php">View Country</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="region_view.php">View Region</a>
                      </li>
              </ul>
          </li> -->
<?php 
if($_SESSION["isrouter"] == "masuk")
{
  echo '          <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
  <i class="fa fa-podcast" aria-hidden="true"></i> Radius
  </a>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
  <!-- <li>
            <a class="dropdown-item" href="Guest_loc.php">Count Guest Based Location</a>
          </li> -->
          <li>
          <a class="dropdown-item" href="../dashboard/cobadash.php"> <i class="fa fa-desktop" aria-hidden="true"></i> Dashboard<span class="sr-only"></span></a>
          </li>
          <li>
            <a class="dropdown-item" href="system"><i class="fa fa-wrench" aria-hidden="true"></i> System</a>
          </li>
          <!-- <li>
            <a class="dropdown-item" href="">Restart</a>
          </li>
          <li>
            <a class="dropdown-item" href="">Shutdown</a>
          </li> -->

  </ul>
</li>';
}
?>


          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user-circle"></i> Account
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li>
                        <a class="dropdown-item" href="../logout/"><i class="fa fa-sign-out"></i> Logout</a>
                      </li>
              </ul>
          </li>

        </ul>
        <!-- <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form> -->
      </div>
    </nav>

    <style>
        body {
  background-color: #ccc;
}  
    </style>