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
echo '<table id ="example" class="table table-bordered table-striped text-center">
<thead>
<tr>
  <th scope="col">User List</th>
  
  <th scope="col">Mac Address</th>
  <th scope="col">IP</th>
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>';

              foreach ($resultac as $data) {
          //echo $data['user'] . '<br>';

          echo '<tr>';
          echo '<th scope="row">'.$data['user'].'</th>';
          echo '<td>'.$data['mac-address'].'</td>
          <td>'.$data['address'].'</td>
          <td>&nbsp <button class ="btn btn-warning">  <i class="fa fa-clock-o"></i> Timeout</button>&nbsp<button class="btn btn-danger "><i class="fa fa-trash"></i> Delete</button></td>';
          
        echo'</tr>';

        

    //             echo '<tr><th scope="row">',$data['user'],'<th>';
    //  echo '<td>',$data['mac-address'],'</td>';
    //  echo '<td>',$data['address'],'</td></tr>';


      }
      echo       '</tbody>
</table>';
?>
</div>