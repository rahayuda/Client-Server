<?php
include "sql.php";

$id 	= $_GET['id'];

$select	= mysqli_query($con,"SELECT * FROM mahasiswa WHERE id='$id'");
while($data = mysqli_fetch_array($select)){
?>

<form method="post" action="update-process.php">
	<table>
		<tr>
			<td>Nim</td>
			<td>
				<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
				<input type="number" name="nim" value="<?php echo $data['nim']; ?>">
			</td>
		</tr>
		<tr>			
			<td>Nama</td>
			<td>
				<input type="text" name="nama" value="<?php echo $data['nama']; ?>">
			</td>
		</tr>
			<td></td>
			<td><input type="submit" value="Update"></td>
		</tr>		
	</table>
</form>

<?php 
}
?>