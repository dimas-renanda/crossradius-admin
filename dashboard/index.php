<?php 
//require_once "../conf/headdash.php";
require_once "../conf/safety.php";
require_once "../conf/bjorka.php";
require_once "../conf/conn.php";
require_once "../assets/assets.php";
require_once "../conf/connrouter.php";
@session_start();
@$_GET["router"];
@$_GET["uidrouter"];
@$_GET["pwdrouter"];

$router = @$_GET["router"];
$uidrouter = @$_GET["uidrouter"];
$pwdrouter = @$_GET["pwdrouter"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X-RADIUS <?= $_SESSION["email"]; ?></title>

<link rel="icon" href="assets/img/crosstab.png" />
    <!-- <link href="http://localhost/crossradius/assets/css/bootstrap.css" rel="stylesheet">
<script src="http://localhost/crossradius/assets/js/bootstrap.bundle.min.js"></script> -->

<style>

.custom-column {  
  background-color: #eee;;
  border: 5px solid #eee;;    
  padding: 10px;
  box-sizing: border-box;  
}

.custom-column-header {
  font-size: 24px;
  background-color: #007bff;  
  color: white;
  padding: 15px;  
  text-align: center;
}

.custom-column-content {
  background-color: #fff;;
  border: 2px solid white;  
  padding: 20px;  
}

.custom-column-footer {
  background-color: #eee;;   
  padding-top: 20px;
  text-align: center;
}
</style>
<?php 
require_once "../conf/navbar.php";
?>
</head>
<body>
<div class="container">

<?php
//echo @$_GET["router"];
if (@$_GET["router"] )
{
   header("Refresh:5");
echo "Hotspot Active On : ",findbjorka(@$_GET["router"],$key,"base64"),"<br>";
echo "<a href='../'><button>Logout router</button></a><br>";
$API = new RouterosAPI();

//'116.68.251.167', 'admin', 'xyz31mei'
//set timeout dari suatu exec
//set_time_limit(5);
if ($API->connect(findbjorka($_GET["router"],$key,"base64"),findbjorka($_GET["uidrouter"],$key,"base64"), findbjorka($_GET["pwdrouter"],$key,"base64"))) 
{

    @session_start();
    $_SESSION["isrouter"] = "masuk";
  
    $gethotspotactive = $API->comm("/ip/hotspot/active/print");
    $TotalReg = count($gethotspotactive);

    $counthotspotactive = $API->comm("/ip/hotspot/active/print");

      $json = json_encode($counthotspotactive);

      $result = json_decode($json, true);

      //var_dump($result);
      //var_dump($counthotspotactive);

      // foreach ($result as $data) {
      //     echo $data['user'] . '<br>';
      // }

      //echo $json;


//     $getsql = "SELECT * from nas";
//     $stmt = $linkrad->prepare($getsql);
//     $stmt->execute();
//     $hasil = $stmt->get_result();
//     $row = $hasil->fetch_assoc();
//     foreach ($hasil as $row)
//     {
//       // echo $row['country_code'];
//       // echo $row['country_name'];
//       // echo $row['region_id'];
//       echo '<tr><th scope="row">',$row['nasname'],'<th>';
//       echo '<td>',$row['type'],'</td>';
//       echo '<td>',$row['ports'],'</td></tr><br>';

//     }

//     echo       '</tbody>
// </table>';

echo "<br><h3>Active User</h3><br>";
echo '<table class="table table-striped text-center">
<thead>
<tr>
  <th scope="col">USER LIST</th>
  <th scope="col"></th>
  <th scope="col">MAC</th>
  <th scope="col">IP</th>
  <th scope="col">Action</th>
</tr>
</thead>
<tbody>';

              foreach ($result as $data) {
          //echo $data['user'] . '<br>';

                echo '<tr><th scope="row">',$data['user'],'<th>';
     echo '<td>',$data['mac-address'],'</td>';
     echo '<td>',$data['address'],'</td>';
     echo '<td><a href="removeuser.php?router='.$router.'&uidrouter='.$uidrouter.'&pwdrouter='.$pwdrouter.'&username='.$data['user'].'"><button class ="btn btn-warning">Kick User</button></a>&nbsp<button class="btn btn-danger">Delete</button></td>';

      }
      echo '</tr><br>';
      echo       '</tbody>
</table>';

  
}
else{
   echo '<script type="text/javascript">alert("Router Not Found !");window.location.href="http://'.$domainnya.'/crossradius/dashboard";</script>';
}

}
else{
//     echo "Pilih Router..";
//     echo "<br><h3>Radius Router</h3>";
//     echo '<table class="table table-striped text-center">
//     <thead>
//       <tr>
//         <th scope="col">NAS Name</th>
//         <th scope="col"></th>
//         <th scope="col">Type</th>
//         <th scope="col">Ports</th>
//       </tr>
//     </thead>
//     <tbody>';

//     $getsql = "SELECT * from nas";
//     $stmt = $linkrad->prepare($getsql);
//     $stmt->execute();
//     $hasil = $stmt->get_result();
//     $row = $hasil->fetch_assoc();
//     foreach ($hasil as $row)
//     {
//       // echo $row['country_code'];
//       // echo $row['country_name'];
//       // echo $row['region_id'];
//       echo '<tr><th scope="row">',$row['nasname'],'<th>';
//       echo '<td>',$row['type'],'</td>';
//       echo '<td>',$row['ports'],'</td></tr><br>';

//     }

//     echo       '</tbody>
// </table>';

echo "<br><h3>Router List</h3>";


// echo '<table class="table table-striped text-center">
// <thead>
//   <tr>
//     <th scope="col">Session</th>
//     <th scope="col"></th>
//     <th scope="col">IP</th>
//     <th scope="col">Type</th>
//   </tr>
// </thead>
// <tbody>';
echo'<button class="btn btn-primary  text-white align-content-end mb-3" data-bs-toggle="modal" data-bs-target="#myModalAddRouter">Add Router</button>';

echo '<div class="container ">

';



$getsql = "SELECT * from router_nas";
$stmt = $linkadmincnm->prepare($getsql);
$stmt->execute();
$hasil = $stmt->get_result();
$row = $hasil->fetch_assoc();
foreach ($hasil as $row)
{
  // echo $row['country_code'];
  // echo $row['country_name'];
  // echo $row['region_id'];
  // echo '<tr><th scope="row">',$row['session_name'],'<th>';
  // echo '<td>',$row['ip'],'</td>';
  // echo '<td>',$row['type'],'</td></tr><br>';

  echo '<div class="row">

  <div class="column">
    <div class="card">
      <div class="card-header"><i class="fa fa-check"></i><h3>'.$row['session_name'].'</h3></div>
      <div class="card-body"><p>'.$row['type'].'</p><br><p>'.$row['ip'].'</p></div>
      <div class="card-footer">
      <div class="container">
      <form action="" method="get">
      <input type="hidden"  name="uidrouter" value="'.bjorkasecure($row['username'],$key,"base64").'">
      <input type="hidden"  name="pwdrouter" value="'.bjorkasecure($row['password'],$key,"base64").'">
      <button class="btn btn-success" type="submit" name ="router" value="'.bjorkasecure($row['ip'],$key,"base64").'">Connect</button>  
      
      </form>
      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModaldelete'.$row['id'].'">Delete</button>
      <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#myModal'.$row['id'].'">Edit</button></div>
      
      </div>
    </div>
  </div>

  
</div><br>';

echo '      <!-- Edit Router -->
<div id="myModal'.$row['id'].'" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Edit Router</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="editrouter.php" method="POST">
               <div class="md-form mb-4">
                  <i class="fas fa-envelope prefix grey-text"> </i> <label for="inputrname">  Router Name </label>
                  <input type="hidden" id="inputrid" name="rid" class="form-control validate"  value='.$row['id'].' >
                  <input type="text" id="inputrname" name="rname" class="form-control validate" placeholder='.$row['session_name'].' required>
               </div>
               <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrusername"> Ruser </label>
                  <input type="text" id="inputrusername" name="rusername"class="form-control validate" placeholder='.$row['username'].' required>
               </div>
               <div class="md-form mb-4">
               <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrpwd"> Ruser </label>
               <input type="password" id="inputrpwd" name="rwpd" class="form-control validate" placeholder='.$row['password'].' required>
            </div>
            <div class="md-form mb-4">
            <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrip"> Ruser </label>
            <input type="text" id="inputrip" name="rip"class="form-control validate" placeholder='.$row['ip'].' required>
         </div>
         <div class="md-form mb-4">
         <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrports"> Ruser </label>
         <input type="text" id="inputrports" name="rports"class="form-control validate" placeholder='.$row['ports'].' required>
      </div>
      <div class="md-form mb-4">
      <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrtype"> Ruser </label>
      <input type="text" id="inputrtype" name="rtype"class="form-control validate" placeholder='.$row['type'].' required>
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





echo '      <!-- Delete Router -->
<div id="myModaldelete'.$row['id'].'" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Delete Router</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="deleterouter.php" method="POST">
               <div class="md-form mb-4">
                  <i class="fas fa-envelope prefix grey-text"> </i> <label for="inputrname">  Are you sure want to delete '.$row['session_name'].' ?</label>
                  <input type="hidden" id="inputrid" name="rid" class="form-control validate"  value='.$row['id'].' >
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

// echo '</tbody>
// </table>';

echo '
</div>';


}

?>

<!-- <div class="card">
    <div class="card-header">
        <div class="card-body">
            <p>haloooo</p>
        </div>
    </div>
</div> -->



</div>

<!-- Add Router -->
<div id="myModalAddRouter" class="modal fade" role="dialog">
<div class="vertical-alignment-helper">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Add Router</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body mx-3" method="POST">
            <form class="form-signin" action ="addrouter.php" method="POST">
               <div class="md-form mb-4">
                  <i class="fas fa-envelope prefix grey-text"> </i> <label for="inputrname">  Router Name </label>
                  
                  <input type="text" id="inputrname" name="rname" class="form-control validate" placeholder='Router Name'].' required>
               </div>
               <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrusername"> User Login </label>
                  <input type="text" id="inputrusername" name="rusername"class="form-control validate" placeholder='UserLogin' required>
               </div>
               <div class="md-form mb-4">
               <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrpwd"> User Password </label>
               <input type="password" id="inputrpwd" name="rpwd" class="form-control validate" placeholder='Password' required>
            </div>
            <div class="md-form mb-4">
            <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrip"> Router IP </label>
            <input type="text" id="inputrip" name="rip"class="form-control validate" placeholder='IP' required>
         </div>
         <div class="md-form mb-4">
         <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrports"> Router Port </label>
         <input type="text" id="inputrports" name="rports"class="form-control validate" placeholder='Port' required>
      </div>
      <div class="md-form mb-4">
      <i class="fas fa-lock prefix grey-text">  </i> <label for="inputrtype"> Router Type (Ex."Mikrotik RB") </label>
      <input type="text" id="inputrtype" name="rtype"class="form-control validate" placeholder='Router Type' required>
   </div>
               <div class="modal-footer d-flex justify-content-center">
                  <button id="redit" class="btn btn-default btn-dark btn-block text-uppercase">Add</button>
               </div>
            </form>
              </div>
          </div>
      </div>
  </div>
</div>


<script>
        $("[id='redit']").click(function() {
          
            var varrid = $("[id='inputrid']").val();
            var varrname = $("[id='inputrname']").val();
            var varrusername = $("[id='inputrusername']").val();
            var varrpwd = $("[id='inputrpwd']").val();
            var varrip = $("[id='inputrip']").val();
            var varrports = $("[id='inputrports']").val();
            var varrtype = $("[id='inputrtype']").val();
            alert(varrid);
            $.ajax({

                url: "editrouter.php",
                method: "POST",
                data: {
                    rid: varrid,
                    rname: varrname,
                    rusername: varrusername,
                    rpwd: varrpwd,
                    rip:varrip,
                    rports:varrports,
                    rtype:varrtype,
                },
                success: function(result) {
                    if (result.notif) {
                        alert(result.notif);
                        console.log('my message' + err);
                    }
                    if (result.location) {
                        window.location.href = result.location;
                    }
                },
                error: function(result) {
                  alert(result.notif);
                  console.log('my message' + err);

                }
            });
        });
        </script>
</body>
</html>