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
$jsonuser = file_get_contents('http://10.10.10.148:38900/GetAllUsersInfo');

$juser= json_decode($jsonuser,true);
$cjuser = count($juser["Data"]);
echo '<h3>'.$cjuser.' Users</h3>';
echo '<table id ="example" class="table table-bordered table-striped text-center">
<thead>
<tr>
  <th scope="col">Access User</th>
  
  <th scope="col">Name </th>

  <th scope="col">Device </th>

  <th scope="col">Action </th>
</tr>
</thead>
<tbody>';

              foreach ($juser["Data"] as $data) {
          //echo $data['user'] . '<br>';
$lusernya = $data['MAC'];
          echo '<tr>';
          echo '<th scope="row">'.$data['MAC'].'</th>';
          echo '<th scope="row">'.$data['AccountName'].'</th>';
          echo '<th scope="row">'.$data['DeviceInfo'].'</th>';
          echo '<th scope="row"><a href="qr.php?v='.$lusernya.'"><button class="btn btn-secondary"><i class="fa fa-qrcode mr-1"></i> QR</button></a>&nbsp</th>';
          
         
        echo'</tr>';

        

    //             echo '<tr><th scope="row">',$data['user'],'<th>';
    //  echo '<td>',$data['mac-address'],'</td>';
    //  echo '<td>',$data['address'],'</td></tr>';


      }
      echo       '</tbody>
</table>';
?>
</div>