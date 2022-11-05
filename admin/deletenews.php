<?php
    //header('Content-type: application/json');
    require_once "../conf/conn.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // declare + assign
        $nid = $_POST['nid'];

        $rgmb = $_POST['timg'];

  // tentukan lokasi file akan dipindahkan
  $dirfilenya = "uploads/img/$rgmb";
unlink("$dirfilenya");

        //echo $nid;
        // check data login
        // SELECT * FROM user WHERE email = '$username'
        $sql = "DELETE FROM news WHERE id = $nid ";
        //echo $sql;
        //echo json_encode(['notif'=>$sql]);
        $stmt = $linkadmincnm->prepare($sql);
        $stmt->execute();
        
        if ($stmt)
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        
       
    }
?>