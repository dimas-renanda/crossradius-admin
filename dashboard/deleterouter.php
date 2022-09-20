<?php
    //header('Content-type: application/json');
    require_once "../conf/conn.php";
    require_once "../conf/connrouter.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // declare + assign
        $rid = $_POST['rid'];
        // check data login
        // SELECT * FROM user WHERE email = '$username'
        $sql = "DELETE FROM router_nas WHERE id = ? ";
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