<?php
include "sql_connection.php";
$que    = "SELECT * FROM cart INNER JOIN product ON cart.product_id = product.id";
$select = mysqli_query($con, $que);

$que1   = "SELECT SUM(total) AS total_amount FROM cart";
$sum 	= mysqli_query($con, $que1);

while ($data = mysqli_fetch_array($select)) {
	echo $data['name'] . ", " . $data['quantity'] . " pcs, " . number_format($data['total'], 0, ',', '.') . " (IDR)<br>";  
}

$row = mysqli_fetch_assoc($sum);

echo "<hr>Total Amount, " . number_format($row['total_amount'], 0, ',', '.') . " (IDR)";
?>