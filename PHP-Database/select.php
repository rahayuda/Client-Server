<?php
include "sql.php";

$query 	= "SELECT * FROM mahasiswa";
$select = mysqli_query($con, $query);
mysqli_num_rows($select);
?>

<a href="insert.php">Insert</a><hr>
<table>

	<?php
	while ($data = mysqli_fetch_array($select)) {
		?>
		<tr>
			<td><?php echo $data['nim']; ?></td> 
			<td><?php echo $data['nama']; ?></td>
			<td><a href="update.php?id=<?php echo $data['id']; ?>">Edit</a></td> 
			<td><a href="delete.php?id=<?php echo $data['id']; ?>">Delete</a></td>
		</tr>
		<?php
	}
	?>

</table>