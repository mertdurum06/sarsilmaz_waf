<?php

session_start();

$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = '';
$DB_NAME = "users";
 
$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ( mysqli_connect_errno() ) {
	exit("Bağlantı hatası.");
}

$id = $_POST['id'];  
$baslik = $_POST['baslik'];  
$aciklama = $_POST['aciklama'];  
$gorsel = $_POST['gorsel'];  

      
$sql = "INSERT INTO haberler (id, baslik, aciklama, gorsel) VALUES ('$id', '$baslik', '$aciklama', '$gorsel')";
if (mysqli_query($con, $sql)) {
    header("Location: /admin/basarili.php");
} else {
    header("Location: /admin/basarisiz.php");
}
mysqli_close($con);
          
?>  