<?php 
include "sql.php";
 
$id 	= $_POST['id'];
$nim 	= $_POST['nim'];
$nama 	= $_POST['nama'];
 
mysqli_query($con,"UPDATE mahasiswa SET nim='$nim', nama='$nama' where id='$id'");
 
header("location:select.php");
?>