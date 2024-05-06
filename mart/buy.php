<?php

$product_id = $_REQUEST['product_id'];
$quantity = $_REQUEST['quantity'];

$query = "INSERT INTO cart (product_id, quantity) VALUES ('$product_id', '$quantity')";

mysqli_query($con, $query);

mysqli_close($con);

header("location:index.php");
?>
