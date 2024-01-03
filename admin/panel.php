<?php

session_start();

if(!isset($_SESSION["login"]))
    {
 
    header("Location: /admin/login.php");
     
    }

if(isset($_SESSION["login"]))
    {
 
    header("Location: /admin/index.php");
     
    }

?>
