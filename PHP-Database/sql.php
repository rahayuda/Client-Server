<?php
$host_name  = "localhost";
$port       = "3307"; 
$user_name  = "root";
$password   = "maria";
$database   = "db1";

$con = mysqli_connect($host_name . ":" . $port, $user_name, $password);
$sdb = mysqli_select_db($con, $database);
?>