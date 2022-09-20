<?php
    header('Content-type: application/json');
    require_once "../conf/conn.php";
    require_once "../conf/connrouter.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // declare + assign
        $rid = $_POST['rid'];
        $rname = $_POST['rname'];
        $rusername = $_POST['rusername'];
        $rpwd = $_POST['rpwd'];
        $rip = $_POST['rip'];
        $rports = $_POST['rports'];
        $rtype = $_POST['rtype'];

        // check data login
        // SELECT * FROM user WHERE email = '$username'
        $sql = "UPDATE router_nas set session_name = '$rname' , username='$rusername',password='$rpwd',ip='$rip',ports='$rports',type='$rtype' WHERE id=? ";
        echo $sql;
        echo json_encode(['notif'=>$sql]);
        $stmt = $linkadmincnm->prepare($sql);
        $stmt->execute([$rid]);
        
        if ($stmt)
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

    }
?>