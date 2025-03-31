<?php
// Data yang akan dikirim ke shard
$data = array(
    "id" => 101,
    "judul" => "Artikel Baru",
    "kategori" => "AI",
    "konten" => "Ini adalah artikel tentang AI"
);

// URL API di shard server
$url = "http://192.168.1.10:8080/webhook-receive/receive.php";

// Konversi data ke JSON
$jsonData = json_encode($data);

// Kirim data dengan cURL
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
$response = curl_exec($ch);
curl_close($ch);

// Cek respon dari shard server
echo "Response: " . $response;
?>