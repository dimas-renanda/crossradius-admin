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
<h3>Customer Services Request</h3>
<hr>




<p style="padding-bottom: 30px;"></p>


<?php 

$json = file_get_contents('http://phoenix.crossnet.co.id:38600/GetCSRequest');
$datanya = json_decode($json,true);
//var_dump($datanya["Data"]);
echo'<table id ="example" class="table table-bordered table-striped text-center">
<thead>
<tr>
<th scope="col">No</th>
  <th scope="col">UserId</th>
  <th scope="col">FirstName</th>
  <th scope="col">Email</th>
  <th scope="col">Respons</th>

</tr>
</thead>
<tbody>';
$no=1;
        foreach ($datanya["Data"] as $data) {
          echo '<tr>';
          echo '<th scope="row">'.$no.'</th>';
          $no++;
          $uid = $data['SentBy'];
          echo '<th scope="row">'.$uid.'</th>';
          $getsql = "SELECT first_name,email from user where id = $uid  ";
$stmt = $linkcnm->prepare($getsql);
$stmt->execute();
$hasil = $stmt->get_result();
$row = $hasil->fetch_assoc();
//$row = mysqli_fetch_array($hasil);
echo '<td>'.$row['first_name'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td > <a class="btn btn-success" href="../chatcs/?uid='.$uid.'"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> Reply</a>
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModaldelete'.$uid.'"><i class="fa fa-trash"></i> End Chat</button></td>';
        echo'</tr>';

        echo '      <!-- Delete Conversation -->
<div id="myModaldelete'.$uid.'" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">End Conversation</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="deleterouter.php" method="POST">
               <div class="md-form mb-4">
               <i class="fa fa-comments-o fa-3x prefix text-primary"> </i> <label for="inputrname"> &nbsp; Are you sure want to end conversation with <br> &nbsp; <b>'.$row['email'].' </b>?</label>
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