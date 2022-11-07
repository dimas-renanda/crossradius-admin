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
<h3>Media and News</h3>
<hr>


<button class="btn btn-info pull-right text-white" data-bs-toggle="modal" data-bs-target="#myModalAddNews" ><i class="fa fa-plus"></i> Add News</button>


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
<th scope="col">No</th>';
 // <th scope="col">Id</th>
  echo' <th scope="col">Title</th>
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
         //  echo '<th scope="row">'.$data['id'].'</th>';
          echo '<td>'.$data['title'].'</td>';
          echo '<td>'.$data['description'].'</td>';
          echo '<td><img src="../admin/uploads/img/'.$data['img'].'" alt="" border=3 height=100 width=200></img></td>';
          echo '<td>'.$data['url'].'</td>';
          echo '<td >      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal'.$data['id'].'"><i class="fa fa-edit"></i></button>
          <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModaldelete'.$data['id'].'"><i class="fa fa-trash"></i></button></td>';


          
        echo'</tr>';

echo '      <!-- Edit News -->
<div id="myModal'.$data['id'].'" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold"><i class="fa fa-newspaper-o"> </i> Edit News</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="editnews.php" method="POST" enctype="multipart/form-data">
               <div class="md-form mb-4">
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
            <div class="md-form mb-4">
            <i class="fa fa-link prefix grey-text">  </i> <label for="inputrip"> Url </label>
            <input type="text"  name="url" class="form-control validate" value='.$data['url'].' required>
         </div>
               <div class="modal-footer d-flex justify-content-center">
                  <button id="redit" class="btn btn-default btn-dark btn-block text-uppercase"><i class="fa fa-edit prefix grey-text">  </i> Edit</button>
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
            <h4 class="modal-title w-100 font-weight-bold"><i class="fa fa-newspaper-o"> </i> Delete News</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="deletenews.php" method="POST">
               <div class="md-form mb-4 text-center">
                  <i class="fa fa-exclamation-triangle fa-3x prefix text-warning"> </i> <br><label for="inputrname">  Are you sure want to delete '.$data['title'].' ?</label>
                  <input type="hidden" name="timg" class="form-control validate"  value='.$data['img'].'>
                  <input type="hidden" id="inputnid" name="nid" class="form-control validate"  value='.$data['id'].' >
               </div>
               <div class="modal-footer d-flex justify-content-center">
                  <button id="redit" class="btn btn-default btn-danger btn-block text-uppercase"><i class="fa fa-trash ">  </i> Delete</button>
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


                    <!-- Add Router -->
<div id="myModalAddNews" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold"> <i class="fa fa-newspaper-o"> </i> Add News</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
         <form action='uploadmedia.php' method="POST" enctype="multipart/form-data">
						<table align ="text-center">   
                     
                  <tr> <td><i class="fa fa-newspaper-o prefix grey-text"> </i> Title</td>
						<td> : </td>
						<td><div class="form-group">
					 <input type="text" name="title" class="form-control " placeholder="News Title" required>
						</div></td>
					</tr>

               <tr> <td><i class="fa fa-file-text prefix grey-text"></i> Description</td>
						<td> : </td>
						<td><div class="form-group">
					 <textarea rows="4" cols="50" name="description" class="form-control " placeholder="Description" required></textarea>
						</div></td>
					</tr>

					<tr> <td><i class="fa fa-picture-o prefix grey-text"></i> News Image &nbsp; (Max 2MB)</td>
						<td> : </td>
						<td><div class="form-group">
					 <input type="file" name="filefoto" class="form-control " placeholder="News Image" required>
						</div></td>
					</tr>

               <tr> <td><i class="fa fa-link prefix grey-text"></i> News Link</td>
						<td> : </td>
						<td><div class="form-group">
					 <input type="text" name="url" class="form-control " placeholder="URL Link" required>
						</div></td>
					</tr>

					<tr> <td></td>
                        <td></td><td> <button  type="submit" class="btn btn-warning btn-block text-white" value="OK"><i class="fa fa-plus-square"></i> Add</button></td>
							<td></td>
                        </tr>
                        
                        </table>
                        
                    </form>
              </div>
          </div>
      </div>
  </div>
</div>

</body>
</html>

