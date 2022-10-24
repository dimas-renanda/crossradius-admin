<?php 

// include "phpqrcode/qrlib.php";

// $isi = 'http://phoenix.crossnet.co.id'; 
 
// QRcode::png($isi); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> QR Code </title>
</head>
<body class="centered-wrapper">
 
    <style type="text/css">

.centered-wrapper {
    position: relative;
    text-align: center;
}
.centered-wrapper:before {
    content: "";
    position: relative;
    display: inline-block;
    width: 0; height: 100%;
    vertical-align: middle;
}
.centered-content {
    display: inline-block;
    vertical-align: middle;
}
        h2,h3{
            text-align: center;
        }

        body{ margin:0 auto; }
 
 
        .hasil{
            text-align: center;
        }

        .column {

  float: left;
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
    </style>
 
    <h2>Akses Internet</h2>
    <div class="centered-content">
        <div class="row"><img src="../assets/img/probolinggo.png" height="75" alt="Kominfo Logo">
        <div class="column"><img src="../assets/img/kominfo.png" height="80"  alt="probolinggoLogo"></div>
    </div>
        
    </div>
    
    <h3><a href="#landingpage">KNM Probolinggo</a></h3>
 


    <div class="hasil">
        <?php 
        if(isset($_GET['v'])){
 
     
            $paramnya = $_GET['v'];
            $isi = "http://crossradius.net/login?username=";
            $isi = $isi.$paramnya."&password=".$paramnya;
            //echo $isi;
 //$isi = "http://crossradius.net/login?username=djuvan123&password=djuvan123";
       
            include "phpqrcode/qrlib.php"; 
 

            $penyimpanan = "temp/";
 

            if (!file_exists($penyimpanan))
             mkdir($penyimpanan);

            QRcode::png($isi, $penyimpanan.'hasil_qrcode.png', QR_ECLEVEL_H, 10, 5); 
         

            echo '<img src="'.$penyimpanan.'hasil_qrcode.png">';
        
        }
        ?>
    </div>

 <i>"Gunakan internet dengan bijak"</i>
 
</body>
</html>