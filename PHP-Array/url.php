<?php
// URL yang akan diproses
$url = "https://www.example.com/path/to/page.php?key1=value1&key2=value2";

// Memecah URL menjadi bagian-bagian menggunakan parse_url()
$url_parts = parse_url($url);
echo "Scheme: " . $url_parts['scheme'] . "<br>";
echo "Host: " . $url_parts['host'] . "<br>";
echo "Path: " . $url_parts['path'] . "<br>";

// Membuat string query URL dari array menggunakan http_build_query()
$query_params = array(
    'key1' => 'value1',
    'key2' => 'value2'
);
$query_string = http_build_query($query_params);
echo "String query URL: " . $query_string . "<br>";

// Mengode URL menggunakan urlencode()
$encoded_url = urlencode($url);
echo "URL terkode: " . $encoded_url . "<br>";

// Mendekode URL menggunakan urldecode()
$decoded_url = urldecode($encoded_url);
echo "URL terdekoded: " . $decoded_url . "<br>";
?>
