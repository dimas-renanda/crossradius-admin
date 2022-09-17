<?php
    header('Content-type: application/json');
    require_once "../conf/conn.php";
    require_once "../conf/connrouter.php";
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
        
        // while($rowData = $stmt->fetch()){
		// 	$hashed_pw = hash('sha512',$password);

		// 	if (hash('sha512', $rowData['salt']. $hashed_pw) === $rowData['password']){
        //         $_SESSION['email'] = $email;
                
        //         if($_SESSION['email'] === 'admin@gmail.com'){
        //             echo json_encode(['location' => '/manpro/admin_home.php']);
        //         }
        //         else{
        //             echo json_encode(['location'=>'/manpro/home.php']);
        //         }
		// 	}
		// 	else{
		// 		echo json_encode(['notif'=>'Email atau Password Salah!']);
		// 	}
						
		// }













        // jika yang login adalah admin
        // if ($stmt) {
        //     if ($stmt['id'] == 0) {
        //         $_SESSION['email'] = $email;
        //         echo json_encode(['location'=>'/tokopetra/seller_home.php']);
        //     }
        //     else if ($stmt['id'] >= 1) {
        //         $_SESSION['email'] = $email;
        //         echo json_encode(['location'=>'/tokopetra/home.php']);
        //     }
        // }
        // else {
        //     // check email
        //     $sql = "SELECT * FROM user WHERE email=?";
        //     $stmt = $pdo->prepare($sql);
        //     $stmt->execute([$email]);
        //     $stmt = $stmt->rowCount();
        //     if($stmt) {
        //         echo json_encode(['notif'=>'Password Salah!']);
        //     }
        //     else {
        //         echo json_encode(['notif'=>'Email yang anda masukkan tidak terdaftar!']);
        //     }
        // }
    }
?>