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
  echo "listprofile";
  echo '<table id ="example" class="table table-bordered table-striped text-center">
<thead>
<tr>
<th scope="col">No</th>
  <th scope="col">Username</th>
  <th scope="col">Profile</th>
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>';
$no=1;

$profile = file_get_contents('http://10.10.10.232:38700/GetProfileHotspot');
$profile = json_decode($profile,true);
foreach($profile as $listprofile)
{
  foreach ($listprofile as $profilenya)
    {
      echo '<tr>';
      echo '<th scope="row">'.$no.'</th>';
      $no++;
      $lusernya = $profilenya['ProfileName'];
      echo '<th scope="row">'.$profilenya['ProfileName'].'</th>';
      echo '<td>'.$profilenya['Groupname'].'</td><td> ';
      //echo '     <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal'.$profilenya['username'].'"><i class="fa fa-edit"></i></button>';
      echo'
     <a href="executedeleteprofile.php?profileName='.$lusernya.'"> <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModaldelete'.$profilenya['username'].'"><i class="fa fa-trash"></i></button></td>';


      
    echo'</tr>';



    }
}

      echo       '</tbody>
</table>';
?>
</div>