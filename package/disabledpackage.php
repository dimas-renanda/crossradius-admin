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
<h3>Disabled Packages</h3>
<hr>



<a href="../admin/?page=packages"><button class="btn btn-info pull-left text-white"  ><i class="fa fa-list"></i>  All Package</button></a>
<button class="btn btn-info pull-right text-white" data-bs-toggle="modal" data-bs-target="#myModalAddPackage" ><i class="fa fa-plus"></i> Add Package</button>


<p style="padding-bottom: 30px;"></p>


<?php 

$json = file_get_contents('http://phoenix.crossnet.co.id:38600/packages');
$isinya = json_decode($json,true);
//var_dump($isinya["Data"]);
echo "<br>";
echo "<br>";
$getsql = "SELECT * from package where isdeleted = 1 ";
$stmt = $linkcnm->prepare($getsql);
$stmt->execute();
$hasil = $stmt->get_result();
$linkcnm->close();
// $datanya = $hasil->fetch_assoc();
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

if ($hasil->num_rows > 0) {
   $no=1;
   // output data of each row
   while($row = $hasil->fetch_assoc()) {
      echo '<tr>';
      echo '<th scope="row">'.$no.'</th>';
      $pid = $row['id'];
      $no++;
      echo '<th scope="row">PID'.$row['id'].'</th>';

//$row = mysqli_fetch_array($hasil);
echo '<td>'.$row['name'].'</td>';
      echo '<td>'.$row['price'].'</td>';
      echo '<td>'.$row['type'].'</td>';
      echo '<td>'.$row['s_download'].'/'.$row['s_upload'].'</td>';
      echo '<td>'.$row['total_devices'].'</td>';
      echo '<td>'.$row['duration_days'].'</td>';
      echo '<td>'.$row['description'].'</td>';
      echo '<td >      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal'.$pid.'"><i class="fa fa-edit"></i> Edit</button>
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModaldelete'.$pid.'"><i class="fa fa-check"></i> Enable</button></td>';
    echo'</tr>';

    echo '      <!-- Update Ticket -->
    <div id="myModal'.$pid.'" class="modal fade" role="dialog">
    <div class="vertical-alignment-helper">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"><i class="fa fa-inbox"></i> Update Package</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body mx-3" method="POST">
                <form class="form-signin" action ="../package/editpackage.php" method="POST">
                              <div class="md-form mb-4">
                              <input type="hidden"  name="pid" class="form-control validate"  value='.$pid.' >
                              <i class="fa fa-inbox" aria-hidden="true"></i> <label for="inputrname">  name </label>
                      <input type="text"  name="name" class="form-control validate" value="'.$row['name'].'" required>
                   </div>

                   <div class="md-form mb-4">
     
                   <i class="fa fa-money prefix grey-text"> </i> <label for="inputrname">  Price </label>
                   <input type="number"  name="price" class="form-control validate" value="'.$row['price'].'" required>
                </div>

                   <div class="md-form mb-4">
                 
                   <i class="fa fa-building" aria-hidden="true"></i> <label for="inputrname">  Type </label>
           <select id="type" name="type"  class="form-select" aria-label=" select type" placeholder="URL Link" required>
           <option value="'.$row['type'].'" disabled>Current Type: '.$row['type'].'</option>
           <option value="'.$row['type'].'">--- Select option ---</option>
           <option value="home">Home</option>
           <option value="office">Office</option>
           <option value="sites">Sites</option>
           </select>
        </div>

        <div class="md-form mb-4">
     
<i class="fa fa-tachometer" aria-hidden="true"></i> <label for="inputrname">  SDownload </label>
<input type="number"  name="download" class="form-control validate" value="'.$row['s_download'].'" required>
</div>

<div class="md-form mb-4">
<i class="fa fa-tachometer" aria-hidden="true"></i> <label for="inputrname">  SUpload </label>
<input type="number"  name="upload" class="form-control validate" value="'.$row['s_upload'].'" required>
</div>

<div class="md-form mb-4">
<i class="fa fa-laptop" aria-hidden="true"></i> <label for="inputrname">  TotalDevices </label>
<input type="number"  name="device" class="form-control validate" value="'.$row['total_devices'].'" required>
</div>

<div class="md-form mb-4">
<i class="fa fa-clock-o" aria-hidden="true"></i> <label for="inputrname">  Duration </label>
<input type="number"  name="duration" class="form-control validate" value="'.$row['duration_days'].'" required>
</div>
                   <div class="md-form mb-4">
                      <i class="fa fa-file-text prefix grey-text">  </i> <label for="inputrusername"> Description </label>
                      <textarea rows="4" cols="50"  name="description"class="form-control validate"  required>'.$row['description'].'</textarea>
                   </div>
                   
                   <div class="modal-footer d-flex justify-content-center">
                      <button id="redit" class="btn btn-default btn-dark btn-block text-uppercase"> <i class="fa fa-check"></i> Update Package</button>
                   </div>
                </form>
                  </div>
              </div>
          </div>
      </div>
    </div>';
    echo '      <!-- Finish Ticket -->
    <div id="myModaldelete'.$pid.'" class="modal fade" role="dialog">
    <div class="vertical-alignment-helper">
       <div class="modal-dialog" role="document">
          <div class="modal-content">
             <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"><i class="fa fa-inbox" aria-hidden="true"></i> Confirm Enable Package</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body mx-3" method="POST">
                <form class="form-signin" action ="../package/enablepackage.php" method="POST">
                   <div class="md-form mb-4">
                      <i class="fa fa-info-circle fa-3x prefix text-info fa-3x prefix text-primary"> </i> <label for="inputrname"> &nbsp; Are you sure want to enable this Package ? <br>  &nbsp; <b> PID'.$pid.'</b></label>
                      <input type="hidden"  name="pid" class="form-control validate"  value='.$pid.' >
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
 } 
 else {
   echo "0 results";
 }



//var_dump($datanya);


        foreach ($datanya as $row) {

    }
    echo       '</tbody>
</table>';
?>
    
</div>


  <!-- Add Package -->
  <div id="myModalAddPackage" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold"> <i class="fa fa-inbox" aria-hidden="true"></i> Add Package</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
         <form action='../package/addpackage.php' method="POST" enctype="multipart/form-data">
						<table align ="text-center">   
                     
                  <tr> <td><i class="fa fa-inbox" aria-hidden="true"></i> Name</td>
						<td> : </td>
						<td><div class="form-group">
					 <input type="text" name="name" class="form-control " placeholder="Package Name" required>
						</div></td>
					</tr>

               <tr> <td><i class="fa fa-money prefix grey-text"> </i> Price</td>
						<td> : </td>
						<td><div class="form-group">
					 <input type="number" name="price" class="form-control " placeholder="Price" required></input>
						</div></td>
					</tr>
                  
               <tr> <td><i class="fa fa-building" aria-hidden="true"></i> Type</td>
						<td> : </td>
						<td><div class="form-group">
                        <select id="type" name="type"  class="form-select" aria-label=" select type" placeholder="URL Link" required>
                        <option value="home">Home</option>
                        <option value="office">Office</option>
                        <option value="sites">Sites</option>
                        </select>
						</div></td>
					</tr>

                    <tr> <td><i class="fa fa-tachometer" aria-hidden="true"></i> download</td>
						<td> : </td>
						<td><div class="form-group">
					 <input type="number" name="download" class="form-control " placeholder="Download" required></input>
						</div></td>
					</tr>

                    <tr> <td><i class="fa fa-tachometer" aria-hidden="true"></i> upload</td>
						<td> : </td>
						<td><div class="form-group">
					 <input type="number" name="upload" class="form-control " placeholder="Upload" required></input>
						</div></td>
					</tr>

                    <tr> <td><i class="fa fa-laptop" aria-hidden="true"></i> device</td>
						<td> : </td>
						<td><div class="form-group">
					 <input type="number" name="device" class="form-control " placeholder="Max Devices" required></input>
						</div></td>
					</tr>

                    <tr> <td><i class="fa fa-clock-o" aria-hidden="true"></i> duration</td>
						<td> : </td>
						<td><div class="form-group">
					 <input type="number" name="duration" class="form-control " placeholder="Day Duration " required></input>
						</div></td>
					</tr>

                    <tr> <td><i class="fa fa-file-text prefix grey-text"></i> description</td>
						<td> : </td>
						<td><div class="form-group">
					 <textarea rows="4" cols="50" name="description" class="form-control " placeholder="Description ..." required></textarea>
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