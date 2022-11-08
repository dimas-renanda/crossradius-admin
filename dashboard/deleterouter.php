<?php
    //header('Content-type: application/json');
    require_once "../conf/conn.php";
    require_once "../conf/connrouter.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // declare + assign
        $rid = $_POST['rid'];
        echo $rid;
        // check data login
        // SELECT * FROM user WHERE email = '$username'
        $sql = "UPDATE router_nas set isdeleted = '1' WHERE id = $rid ";
        $stmt = $linkadmincnm->prepare($sql);
        $stmt->execute();
        echo $sql;
        echo json_encode(['notif'=>$sql]);

        
        if ($stmt)
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        
       
    }
?>