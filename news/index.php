<?php 
require_once "../conf/safety.php";
require_once "../conf/bjorka.php";
require_once "../conf/conn.php";
require_once "../assets/assets.php";

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

    <title>News</title>

    <script>
        $(document).ready(function () {
    $('#example').DataTable(
        {
            responsive: true
        }
    );
});
    </script>
</head>

<body>

<div class="col-md" style="padding-left: 20px; padding-top: 20px; padding-bottom: 20px; padding-right: 20px;">
<h3>Media and News</h3>
<hr>


<button class="btn btn-info pull-right text-white" ><i class="fa fa-plus"></i> Add News</button>


<p style="padding-bottom: 30px;"></p>


<?php 

$getsql = "SELECT * from news";
$stmt = $linkadmincnm->prepare($getsql);
$stmt->execute();
$hasil = $stmt->get_result();
$row = $hasil->fetch_assoc();
echo '<table id ="example" class="table table-bordered table-striped text-center">
<thead>
<tr>
<th scope="col">No</th>
  <th scope="col">Id</th>
  <th scope="col">Title</th>
  <th scope="col">Description</th>
  <th scope="col">Img</th>
  <th scope="col">Url</th>
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>';
$no=1;
              foreach ($hasil as $data) {


          echo '<tr>';
          echo '<th scope="row">'.$no.'</th>';
          $no++;
          echo '<th scope="row">'.$data['id'].'</th>';
          echo '<td>'.$data['title'].'</td>';
          echo '<td>'.$data['description'].'</td>';
          echo '<td>'.$data['img'].'</td>';
          echo '<td>'.$data['url'].'</td>';
          echo '<td style="float: right">      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal'.$data['id'].'"><i class="fa fa-edit"></i></button>
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModaldelete'.$data['id'].'"><i class="fa fa-trash"></i></button></td>';


          
        echo'</tr>';

echo '      <!-- Edit News -->
<div id="myModal'.$data['id'].'" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Edit News</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="editrouter.php" method="POST">
               <div class="md-form mb-4">
                  <i class="fas fa-envelope prefix grey-text"> </i> <label for="inputrname">  Title </label>
                  <input type="hidden" id="inputrid" name="rid" class="form-control validate"  value='.$data['id'].' >
                  <input type="text" id="inputrname" name="rname" class="form-control validate" value="'.$data['title'].'" >
               </div>
               <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrusername"> Description </label>
                  <input type="text" id="inputrusername" name="rusername"class="form-control validate" value="'.$data['description'].'" required>
               </div>
               <div class="md-form mb-4">
               <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrpwd"> Router Img </label>
               <input type="text" id="inputrpwd" name="rwpd" class="form-control validate" value='.$data['img'].' required>
            </div>
            <div class="md-form mb-4">
            <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrip"> Url </label>
            <input type="text" id="inputrip" name="rip"class="form-control validate" value='.$data['url'].' required>
         </div>
               <div class="modal-footer d-flex justify-content-center">
                  <button id="redit" class="btn btn-default btn-dark btn-block text-uppercase">Edit</button>
               </div>
            </form>
              </div>
          </div>
      </div>
  </div>
</div>';


echo '      <!-- Delete News -->
<div id="myModaldelete'.$data['id'].'" class="modal fade" role="dialog">
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
                  <i class="fas fa-envelope prefix grey-text"> </i> <label for="inputrname">  Are you sure want to delete '.$data['title'].' ?</label>
                  <input type="hidden" id="inputrid" name="rid" class="form-control validate"  value='.$data['id'].' >
               </div>
               <div class="modal-footer d-flex justify-content-center">
                  <button id="redit" class="btn btn-default btn-dark btn-block text-uppercase">Delete</button>
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

