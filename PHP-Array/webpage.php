<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<div class="container mt-4">
  <div class="row row-cols-1 row-cols-md-4 g-4">

    <?php
    $produk = array(
      array("Laptop ASUS X543", 7500000, 25, "..."),
      array("Smartphone Samsung Galaxy S21", 12000000, 15, "..."),
      array("Meja Kantor Kayu", 1500000, 10, "..."),
      array("Baju T-shirt Pria", 150000, 50, "..."),
      array("Sepatu Sneakers Wanita", 300000, 30, "...")
    );

    foreach ($produk as $data_produk) {
      ?>
      <div class="col">
        <div class="card" h-100">
          <img src="https://d27jswm5an3efw.cloudfront.net/app/uploads/2019/07/insert-image-html.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $data_produk[0] ?></h5>
            <p class="card-text"><?php echo $data_produk[3] ?></p>
            <h6><?php echo "Harga: Rp " . number_format($data_produk[1], 0, ',', '.') ?></h6>
            <h6><?php echo "Stok: " . $data_produk[2] ?></h6><hr>
            <a href="#" class="btn btn-primary">Beli</a>
          </div>
        </div>
      </div>

    <?php } ?>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

</body>
</html>