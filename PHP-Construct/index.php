<?php 
include "test.php";
require "test.php";

//Perbedaan include() dan require() adalah jika file tidak ditemukan, include() akan menampilkan peringatan dan melanjutkan eksekusi, sedangkan require() akan menghasilkan error fatal dan menghentikan eksekusi.

include_once "test.php";
require_once "test.php";

//Perbedaan include() dengan include_once() adalah include() menyisipkan file setiap kali dipanggil, sedangkan include_once() hanya menyisipkan file sekali, meskipun dipanggil beberapa kali.
?>