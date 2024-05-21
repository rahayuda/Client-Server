<?php

$host_name  = "localhost";
$port       = "3309"; 
$user_name  = "postgres"; 
$password   = "postgresql"; 
$database   = "db1";

$conn = pg_connect("host=$host_name port=$port dbname=$database user=$user_name password=$password");

$query = "SELECT * FROM users";
$result = pg_query($conn, $query);

while ($row = pg_fetch_assoc($result)) {
	echo "ID: " . $row['user_id'] . ", Nama: " . $row['username'] . ", Email: " . $row['email'] . "<br>";
}

?>