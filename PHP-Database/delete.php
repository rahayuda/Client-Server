<?php 
include "sql.php";

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM mahasiswa WHERE id='$id'");
 
header("location:select.php");
?>