<?php 
require_once "../conf/safety.php";
require_once "../conf/bjorka.php";
require_once "../conf/conn.php";
require_once "../assets/assets.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <title>CS</title>

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
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    });
}

});

    </script>
</head>

<body>

<div class="col-md" style="padding-left: 20px; padding-top: 20px; padding-bottom: 20px; padding-right: 20px;">
<h3>Packages</h3>
<hr>




<p style="padding-bottom: 30px;"></p>


<?php 

$json = file_get_contents('http://phoenix.crossnet.co.id:38600/packages');
$datanya = json_decode($json,true);
//var_dump($datanya["Data"]);
echo'<table id ="example" class="table table-bordered table-striped text-center">
<thead>
<tr>
<th scope="col">No</th>
  <th scope="col">PackageId</th>
  <th scope="col">Name</th>
  <th scope="col">Price</th>
  <th scope="col">Type</th>
  <th scope="col">Download/Upload</th>
  <th scope="col">Total Devices</th>
  <th scope="col">Duration</th>
  <th scope="col">Description</th>
  <th scope="col">Action</th>

</tr>
</thead>
<tbody>';
$no=1;
        foreach ($datanya["Data"] as $data) {
          echo '<tr>';
          echo '<th scope="row">'.$no.'</th>';
          $uid = $data['Id'];
          $no++;
          echo '<th scope="row">'.$data['Id'].'</th>';

//$row = mysqli_fetch_array($hasil);
echo '<td>'.$data['Name'].'</td>';
          echo '<td>'.$data['Price'].'</td>';
          echo '<td>'.$data['Type'].'</td>';
          echo '<td>'.$data['SDownload'].'/'.$data['SUpload'].'</td>';
          echo '<td>'.$data['TotalDevices'].'</td>';
          echo '<td>'.$data['Duration'].'</td>';
          echo '<td>'.$data['Description'].'</td>';
          echo '<td >      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-edit"></i> Edit</button>
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModaldelete'.$uid.'"><i class="fa fa-ban"></i> Disable</button></td>';
        echo'</tr>';

        echo '      <!-- Delete News -->
<div id="myModaldelete'.$uid.'" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Delete News</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="deleterouter.php" method="POST">
               <div class="md-form mb-4">
                  <i class="fas fa-envelope prefix grey-text"> </i> <label for="inputrname">  Are you sure want to end chat with '.$row['email'].' ?</label>
                  <input type="hidden" id="inputrid" name="rid" class="form-control validate"  value='.$uid.' >
               </div>
               <div class="modal-footer d-flex justify-content-center">
                  <button id="redit" class="btn btn-default btn-dark btn-block text-uppercase">End Chat</button>
               </div>
            </form>
              </div>
          </div>
      </div>
  </div>
</div>';
    }
    echo       '</tbody>
</table>';
?>
    
</div>

</body>
</html>