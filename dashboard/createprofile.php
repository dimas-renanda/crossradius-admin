<?php 





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
  <h3><i class="fa fa-user-plus"></i> Add Profile <small id="loader" style="display: none;"><i><i class="fa fa-circle-o-notch fa-spin"></i> Processing... </i></small></h3> 
  </div>
  <div class="card-body">
<form autocomplete="off" method="post" action="executecreateprofile.php">  
  <div>
      <a class="btn bg-warning" href=""> <i class="fa fa-close"></i> Close</a>    <button type="submit" onclick="loader()" class="btn bg-primary" name="save"><i class="fa fa-save"></i> Save</button>
  </div>

<table class="table">
  <tbody>
  <tr>
    <td class="align-middle" required="1" autofocus="">Profile Name</td><td>
        <div class="input-group">
          <div class="input-group-11 col-box-10">
            <input class="group-item group-item-l" id="profileName" type="text" name="profileName" autocomplete="new-password" value="" required="0" aria-autocomplete="list">
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
    <td class="align-middle">Profile Attribute</td><td><input class="form-control" type="text" autocomplete="off" name="profileAttribute" value=""></td>
  </tr>
  <tr>
    <td class="align-middle">Profile Operator</td><td><input class="form-control" type="text" value =":=" autocomplete="off" name="profileOperator" value=""></td>
  </tr>
  <tr>
    <td class="align-middle">Attribute Value</td><td><input class="form-control" type="text" autocomplete="off" name="profileValue" value=""></td>
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

</script>
</div>