<?php
// Contoh string
$string = "Halo, dunia! Ini adalah contoh string.";

// Menghitung panjang string menggunakan strlen()
$length = strlen($string);
echo "Panjang string: $length<br>";

// Mengganti semua kemunculan string tertentu dengan string lain menggunakan str_replace()
$new_string = str_replace("contoh", "demo", $string);
echo "String baru setelah penggantian: $new_string<br>";

// Mengambil potongan string tertentu menggunakan substr()
$substring = substr($string, 6, 6);
echo "Potongan string: $substring<br>";

// Mencari posisi pertama dari substring dalam string menggunakan strpos()
$position = strpos($string, "dunia");
echo "Posisi pertama dari 'dunia': $position<br>";

// Membalik string menggunakan strrev()
$reversed_string = strrev($string);
echo "String terbalik: $reversed_string<br>";
?>
