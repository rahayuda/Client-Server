<?php
// Array untuk dicari
$numbers = array(4, 6, 8, 10, 12);

// Nilai yang dicari
$searched_value = 8;
$searched_value2 = 7;

// Pencarian menggunakan array_search()
$result = array_search($searched_value, $numbers);
if ($result !== false) {
    echo "array_search(): Nilai $searched_value ditemukan pada indeks $result dalam array.<br>";
} else {
    echo "array_search(): Nilai $searched_value tidak ditemukan dalam array.<br>";
}

$result2 = array_search($searched_value2, $numbers);
if ($result2 !== false) {
    echo "array_search(): Nilai $searched_value2 ditemukan pada indeks $result2 dalam array.<br>";
} else {
    echo "array_search(): Nilai $searched_value2 tidak ditemukan dalam array.<br>";
}

// Pencarian menggunakan in_array()
if (in_array($searched_value, $numbers)) {
    echo "in_array(): Nilai $searched_value ditemukan dalam array.<br>";
} else {
    echo "in_array(): Nilai $searched_value tidak ditemukan dalam array.<br>";
}

if (in_array($searched_value2, $numbers)) {
    echo "in_array(): Nilai $searched_value2 ditemukan dalam array.<br>";
} else {
    echo "in_array(): Nilai $searched_value2 tidak ditemukan dalam array.<br>";
}

// Array asosiatif untuk dicari kuncinya
$age = array("Peter" => 35, "Ben" => 37, "Joe" => 43);

// Kunci yang dicari
$searched_key = "Ben";
$searched_key2 = "Tom";

// Pencarian menggunakan array_key_exists()
if (array_key_exists($searched_key, $age)) {
    echo "array_key_exists(): Kunci '$searched_key' ditemukan dalam array.<br>";
} else {
    echo "array_key_exists(): Kunci '$searched_key' tidak ditemukan dalam array.<br>";
}

if (array_key_exists($searched_key2, $age)) {
    echo "array_key_exists(): Kunci '$searched_key2' ditemukan dalam array.<br>";
} else {
    echo "array_key_exists(): Kunci '$searched_key2' tidak ditemukan dalam array.<br>";
}
?>
