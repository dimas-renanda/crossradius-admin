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
<?php 
$jsonuser = file_get_contents('http://10.10.10.232:38700/GetAllUsers');

$juser= json_decode($jsonuser,true);
$cjuser = count($juser["Data"]);
echo '<h3>'.$cjuser.' Users</h3>';
echo '<table id ="example" class="table table-bordered table-striped text-center">
<thead>
<tr>
  <th scope="col">User List</th>
  
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>';

              foreach ($juser["Data"] as $data) {
          //echo $data['user'] . '<br>';

          echo '<tr>';
          echo '<th scope="row">'.$data['Username'].'</th>';
          echo '<td><button class ="btn btn-info"><i class="fa fa-edit mr-1"></i> Edit</button>&nbsp<button class="btn btn-danger"><i class="fa fa-trash mr-1"></i> Delete</button></td>';
          
        echo'</tr>';

        

    //             echo '<tr><th scope="row">',$data['user'],'<th>';
    //  echo '<td>',$data['mac-address'],'</td>';
    //  echo '<td>',$data['address'],'</td></tr>';


      }
      echo       '</tbody>
</table>';
?>
</div>