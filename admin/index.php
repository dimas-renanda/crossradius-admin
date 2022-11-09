<?php 

require_once "../conf/safety.php";
require_once "../conf/bjorka.php";
require_once "../assets/assets.php";
require_once '../conf/adminsidebar/assets.php' ;
require_once "../conf/conn.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CNM</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <?php echo '<link href="http://'.$_SERVER['HTTP_HOST'].'/xradius/crossradius-admin/conf/adminsidebar/css/styles.css" rel="stylesheet">'; ?>
<!-- pacee loading -->
        <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@1.2.4/themes/blue/pace-theme-flash.css">
<script>
  $(document).ready(function () {
    $('#example').DataTable(
        {
            responsive: true
        }
    );
});
window.addEventListener('DOMContentLoaded', event => {

// Toggle the side navigation
const sidebarToggle = document.body.querySelector('#sidebarToggle');
if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        document.body.classList.toggle('sb-sidenav-toggled');
    }
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    });
}

});

    </script>
    </head>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><a class="navbar-brand" href="">
  &nbsp;
      <?php echo '<img class="navbar-brand" src="http://'.$domainnya.'/xradius/crossradius-admin/assets/img/xspin.gif" alt="XNET Logo" height="40">'; ?>
      CNM </a></div>
                <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../"><i class="fa fa-server"></i> Router List</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../admin?page=news"><i class="fa fa-newspaper-o"></i> News</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../admin?page=cs"><i class="fa fa-comments-o" aria-hidden="true"></i> Customer Services</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../admin?page=tickets"><i class="fa fa-user-times" aria-hidden="true"></i> Ticketing</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../admin?page=packages"><i class="fa fa-tachometer" aria-hidden="true"></i> List Package</a>

                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom  ">
                    <div class="container-fluid">
                    
                        <button class="btn  bg-transparent " id="sidebarToggle"><i class="fa fa-bars"></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <!-- <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Link</a></li> -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['email']; ?></a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="../logout/"><i class="fa fa-sign-out"></i> Logout</a>
                                     
                                        <!-- <div class="dropdown-divider"></div> -->

                                        
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </nav>
                <!-- Page content-->


                <?php 
                $content = @$_GET['page'];
                                if ($content=='news')
                                {
                                    require_once '../news/news.php';
                                }
                                elseif($content=='cs')
                                {
                                    require_once '../CS/index.php';
                                }
                                elseif($content=='tickets')
                                {
                                    require_once '../ticket/index.php';
                                }
                                elseif($content=='packages')
                                {
                                    require_once '../package/index.php';
                                }
                                elseif($content=='disabled_package')
                                {
                                    require_once '../package/disabledpackage.php';
                                }
                                else{

                                    echo'
                                    <div class="container-fluid">
                                    <h1 class="mt-4">Admin Sidebar</h1>
                                    <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
                                    <p>
                                        Make sure to keep all page content within the
                                        <code>#page-content-wrapper</code>
                                        . The top navbar is optional, and just for demonstration. Just create an element with the
                                        <code>#sidebarToggle</code>
                                        ID which will toggle the menu when clicked.
                                    </p> 
                
                                    
                                </div>';
                                }
                 ?>



            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <?php echo '<script src="http://'.$_SERVER['HTTP_HOST'].'/xradius/crossradius-admin/conf/adminsidebar/js/scripts.js">'; ?>
        <script src="js/scripts.js"></script>
</html>
