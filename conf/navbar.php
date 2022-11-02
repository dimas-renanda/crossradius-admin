<?php require_once'../conf/conn.php';    ob_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="">
  &nbsp;
      <?php echo '<img class="navbar-brand" src="https://www.kominfo.go.id/images/logo.png" alt="XNET Logo" height="40">'; ?>
      KNM</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav mr-auto">


          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Radius
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <!-- <li>
                        <a class="dropdown-item" href="Guest_loc.php">Count Guest Based Location</a>
                      </li> -->
                      <li>
                      <a class="dropdown-item" href="../dashboard/cobadash.php"> <i class="fa fa-desktop" aria-hidden="true"></i> Dashboard<span class="sr-only"></span></a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="../system/"><i class="fa fa-wrench" aria-hidden="true"></i> System</a>
                      </li>


              </ul>
          </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li>
                        <a class="dropdown-item" href="../logout/"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
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