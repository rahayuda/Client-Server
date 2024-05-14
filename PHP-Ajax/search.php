<?php
$host_name  = "localhost";
$port       = "3307"; 
$user_name  = "root";
$password   = "maria";
$database   = "db1";

$con = mysqli_connect($host_name . ":" . $port, $user_name, $password);
$sdb = mysqli_select_db($con, $database);

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM mahasiswa WHERE nim LIKE '%$search%' OR nama LIKE '%$search%'";
$result = mysqli_query($con, $sql);

$mahasiswa = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $mahasiswa[] = $row;
    }
}

echo json_encode($mahasiswa);

mysqli_close($con);
?>