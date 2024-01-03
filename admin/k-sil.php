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

$username = $_SESSION['username']; 

$sql = "DELETE FROM user WHERE username = '$username'";

if (mysqli_query($con, $sql)) {
    header("Location: /admin/basarili.php");
} else {
    header("Location: /admin/basarisiz.php");
}
mysqli_close($con);

session_destroy();
 
header("Location: /admin/login.php");
          
?>  