<?php 
include "sql.php";
 
$nim 	= $_POST['nim'];
$nama 	= $_POST['nama'];

mysqli_query($con,"INSERT INTO mahasiswa (nim,nama) VALUES('$nim','$nama')");
 
header("location:select.php");
?>