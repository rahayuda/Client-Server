<ul>
    <li><a href="index.php?page=beranda">Beranda</a></li>
    <li><a href="index.php?page=produk">Produk</a></li>
    <li><a href="index.php?page=kontak">Kontak</a></li>
</ul>

<?php
$halaman = isset($_GET['page']) ? $_GET['page'] : 'beranda';

switch ($halaman) {
    case 'beranda':
    include('beranda.php'); 
    break;
    case 'produk':
    include('produk.php'); 
    break;
    case 'kontak':
    include('kontak.php'); 
    break;
    default:
    include('404.php'); 
    break;
}
?>