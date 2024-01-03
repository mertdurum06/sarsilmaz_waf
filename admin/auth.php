<?php
require_once "../sarsilmaz_waf.php";

$DB_SERVER = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = '';
$DB_NAME = "users";
 
$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

if ( mysqli_connect_errno() ) {
	exit("Bağlantı hatası.");
}

$username = $_POST['username'];  
$password = $_POST['password'];  
$username = stripcslashes($username);  
$password = stripcslashes($password);   
      
$sql = "select * from user where username = '$username' and password = '$password' ";  
$result = mysqli_query($con, $sql);  
$count = mysqli_num_rows($result);  

session_start();

if($count == 1){  
    $_SESSION["login"] = "True"; 
    $_SESSION["username"] = $username; 
    header("Location: /admin/index.php");
}  
else{    
    header("Location: /admin/login.php");
}  

?>  
