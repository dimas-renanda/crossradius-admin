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
<h3>Tickets</h3>
<hr>




<p style="padding-bottom: 30px;"></p>


<?php 

$json = file_get_contents('http://phoenix.crossnet.co.id:38600/GetAllTickets');
$datanya = json_decode($json,true);
//var_dump($datanya["Data"]);
echo'<table id ="example" class="table table-bordered table-striped text-center">
<thead>
<tr>
<th scope="col">No</th>
  <th scope="col">User ID</th>
  <th scope="col">Ticket ID</th>
  <th scope="col">SID</th>
  <th scope="col">Email</th>
  <th scope="col">Submited Date</th>
  <th scope="col">Topic</th>
  <th scope="col">Description</th>
  <th scope="col">Progress </th>
  <th scope="col">Action </th>

</tr>
</thead>
<tbody>';
$no=1;
        foreach ($datanya["Data"] as $data) {
          echo '<tr>';
          echo '<th scope="row">'.$no.'</th>';
          $no++;
          $uid = $data['UserID'];
          $tid = $data['TicketID'];
          echo '<th scope="row">USR'.$uid.'</th>';
          $getsql = "SELECT email from user where id = $uid  ";
$stmt = $linkcnm->prepare($getsql);
$stmt->execute();
$hasil = $stmt->get_result();
$row = $hasil->fetch_assoc();
//$row = mysqli_fetch_array($hasil);
echo '<td>TC'.$data['TicketID'].'</td>';
echo '<td>XNT'.$data['SID'].'</td>';
          echo '<td>'.$row['email'].'</td>';
          echo '<td>'.$data['CreationDate'].'</td>';
          echo '<td>'.$data['Topic'].'</td>';
          echo '<td>'.$data['Description'].'</td>';
          echo '<td>'.$data['TicketStatus'].'</td>';
          echo '<td >      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal'.$tid.'"><i class="fa fa-check"></i> </button>
          <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModaldelete'.$tid.'"><i class="fa fa-edit"></i> </button>
         </td>';
        echo'</tr>';

        echo '      <!-- Update Ticket -->
<div id="myModaldelete'.$tid.'" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold"><i class="fa fa fa-list-alt"></i> Update Ticket</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="deleterouter.php" method="POST">
                          <div class="md-form mb-4">
                          <input type="hidden"  name="tid" class="form-control validate"  value='.$tid.' >
                  <i class="fa fa-newspaper-o prefix grey-text"> </i> <label for="inputrname">  Title </label>
                  <input type="hidden" name="timg" class="form-control validate"  value='.$data['img'].'>
                  <input type="hidden" name="id" class="form-control validate"  value='.$data['id'].' >
                  <input type="text"  name="title" class="form-control validate" value="'.$data['title'].'" required>
               </div>
               <div class="md-form mb-4">
                  <i class="fa fa-file-text prefix grey-text">  </i> <label for="inputrusername"> Description </label>
                  <textarea rows="4" cols="50"  name="description"class="form-control validate"  required>'.$data['description'].'</textarea>
               </div>
               <div class="md-form mb-4">
               <i class="fa fa-picture-o prefix grey-text">  </i> <label for="inputrpwd"> News Image </label>
               <input type="file" name="filefoto" class="form-control validate"  >
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
echo '      <!-- Finish Ticket -->
<div id="myModal'.$tid.'" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold"><i class="fa fa fa-list-alt"></i> Confirm Ticket</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="../ticket/finishticket.php" method="POST">
               <div class="md-form mb-4">
                  <i class="fa fa-info-circle fa-3x prefix text-primary"> </i> <label for="inputrname"> &nbsp; Are you sure want to finish this ticket ? <br>  &nbsp; <b> TC'.$tid.'</b></label>
                  <input type="hidden"  name="tid" class="form-control validate"  value='.$tid.' >
               </div>
               <div class="modal-footer d-flex justify-content-center">
                  <button id="redit" class="btn btn-default btn-primary btn-block text-uppercase"><i class="fa fa-check"></i> Submit</button>
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