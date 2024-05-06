<?php
$que    = "SELECT * FROM product";
$select = mysqli_query($con, $que);
$no     = 1; 

while ($data = mysqli_fetch_array($select)) {
	?>
	<div class="product">
		<div class="card">
			<i class="fas fa-th-list"></i>&nbsp;<?php echo $data['name']; ?><hr>
			<img src="<?php echo $data['image']; ?>" class="product-img">
			<p>
				<?php echo $data['category']; ?> | <?php echo $data['stock']; ?> <br>
				<?php echo number_format($data['price'], 0, ',', '.'); ?>
			</p>
			<hr>
			<p>
                <form action="index.php?page=buy" method="post"> 
                    <input type="hidden" name="product_id" value="<?php echo $data['id']; ?>"> 
                    <input type="number" name="quantity" value="1" min="1" step="1" oninput="validity.valid||(value='');">
                    <button type="submit" name="buy">Buy</button> 
                </form>
			</p>
		</div>
	</div>
<?php } ?>