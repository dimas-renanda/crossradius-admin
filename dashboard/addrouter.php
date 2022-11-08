<?php
    require_once "../conf/conn.php";
    //require_once "../conf/connrouter.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // declare + assign
        $rname = $_POST['rname'];
        $rusername = $_POST['rusername'];
        $rpwd = $_POST['rpwd'];
        $rip = $_POST['rip'];
        $rports = $_POST['rports'];
        $rtype = $_POST['rtype'];

        // check data login
        // SELECT * FROM user WHERE email = '$username'
        $sql = "INSERT INTO router_nas (session_name, username ,password,ip,ports,type)VALUES('$rname','$rusername','$rpwd','$rip','$rports','$rtype') ";
        echo $sql;
        echo json_encode(['notif'=>$sql]);
        $stmt = $linkadmincnm->prepare($sql);
        $stmt->execute();

        if ($stmt)
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        

    }
?>