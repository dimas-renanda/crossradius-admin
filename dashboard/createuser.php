<?php 

require_once "sys.php";



?>

<head>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" /> -->

    <link rel="stylesheet" href="https://toert.github.io/Isolated-Bootstrap/versions/4.0.0-beta/iso_bootstrap4.0.0min.css">


    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.material.min.css" /> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
    $('#example').DataTable();
});

// $(document).ready(function () {
//     $('#example').DataTable({
//         autoWidth: false,
//         columnDefs: [
//             {
//                 targets: ['_all'],
//                 className: 'mdc-data-table__cell',
//             },
//         ],
//     });
// });
    </script>
</head>
<div class="bootstrap">

</div>

<div class="row">
<div class="col-8">
<div class="card box-bordered">
  <div class="card-header">
  <h3><i class="fa fa-user-plus"></i> Add User <small id="loader" style="display: none;"><i><i class="fa fa-circle-o-notch fa-spin"></i> Processing... </i></small></h3> 
  </div>
  <div class="card-body">
<form autocomplete="off" method="post" action="">  
  <div>
      <a class="btn bg-warning" href="./?hotspot=users&amp;profile=all&amp;session=Soda2a-ip150"> <i class="fa fa-close"></i> Close</a>    <button type="submit" onclick="loader()" class="btn bg-primary" name="save"><i class="fa fa-save"></i> Save</button>
  </div>

<table class="table">
  <tbody><tr>
    <td class="align-middle">Server</td>
    <td>
			<select class="form-control" name="server" required="1">
				<option>all</option>
				<option>hotspot1</option>			</select>
		</td>
	</tr>
  <tr>
    <td class="align-middle">Name</td><td><input class="form-control" type="text" autocomplete="off" name="name" value="" required="1" autofocus=""></td>
  </tr>
  <tr>
    <td class="align-middle">Password</td><td>
        <div class="input-group">
          <div class="input-group-11 col-box-10">
            <input class="group-item group-item-l" id="passUser" type="password" name="pass" autocomplete="new-password" value="" required="1" aria-autocomplete="list">
          </div>
            <div class="input-group-1 col-box-2">
              <div class="group-item group-item-r pd-2p5 text-center">
              <input title="Show/Hide Password" type="checkbox" onclick="PassUser()">
            </div>
            </div>
        </div>
		</td>
  </tr>
  <tr>
    <td class="align-middle">Profile</td><td>
			<select class="form-control" onchange="GetVP();" id="uprof" name="profile" required="1">
				<option>default</option><option>3mbps</option><option>5mbps</option><option>10mbps</option><option>1M</option><option>20M</option><option>2mb</option><option>15_Mbps</option><option>Disabled_user</option><option>guestornotimportant</option>			</select>
		</td>
	</tr>
	<tr>
    <td class="align-middle">Time Limit</td><td><input class="form-control" type="text" autocomplete="off" name="timelimit" value=""></td>
  </tr>
  <tr>
    <td class="align-middle">Data Limit</td><td>
      <div class="input-group">
        <div class="input-group-10 col-box-9">
          <input class="group-item group-item-l" type="number" min="0" max="9999" name="datalimit" value="">
        </div>
          <div class="input-group-2 col-box-3">
              <select style="padding:4.2px;" class="group-item group-item-r" name="mbgb" required="1">
				        <option value="1048576">MB</option>
				        <option value="1073741824">GB</option>
			        </select>
          </div>
      </div>
    </td>
  </tr>
  <tr>
    <td class="align-middle">Comment</td><td><input class="form-control" type="text" title="No special characters" id="comment" autocomplete="off" name="comment" value=""></td>
  </tr>
  <tr>
    <td colspan="4" class="align-middle" id="GetValidPrice"></td>
  </tr>
</tbody></table>
</form>
</div>
</div>
</div>
<div class="col-4">
  <div class="card">
    <div class="card-header">
      <h3><i class="fa fa-book"></i> Read Me</h3>
    </div>
    <div class="card-body">
<table>
   <tbody><tr>
    <td colspan="2">
    <p style="padding:0px 5px;">
      
    Format Time Limit.<br>
    [wdhm] Example : 30d = 30days, 12h = 12hours, 4w3d = 31days.
    </p>
    <p style="padding:0px 5px;">
      
    Add User with Time Limit.<br>
    Should Time Limit &lt; Validity.
    </p>
    </td>
  </tr>
</tbody></table>
</div>
</div>
</div>
<script>
// get valid $ price
function GetVP(){
  var prof = document.getElementById('uprof').value;
  $("#GetValidPrice").load("./process/getvalidprice.php?name="+prof+"&session=Soda2a-ip150 #getdata");
}  
</script>
</div>