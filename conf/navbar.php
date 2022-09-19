<?php require_once'../conf/conn.php';    ob_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="">MikroX Radius</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
           
            <a class="nav-link" href="../"> Dashboard<span class="sr-only"></span></a>
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

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Conf
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <!-- <li>
                        <a class="dropdown-item" href="Guest_loc.php">Count Guest Based Location</a>
                      </li> -->
                      <li>
                        <a class="dropdown-item" href="best_hotel.php">Best Hotel by Booked</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="best_guest.php">Count Best Customer and country</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="hotel_type.php">Hotel type</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="hotel_country.php">Hotel in country region</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="roomavg.php">Hotel price rate</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="leadbook.php">Lead Time</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="datediff.php">Lead Time Cancelled Booking</a>
                      </li>
              </ul>
          </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li>
                        <a class="dropdown-item" href="../">Login</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="../logout/">Logout</a>
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