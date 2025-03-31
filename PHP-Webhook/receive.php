<?php
// Koneksi ke MySQL di shard server
$mysqli = new mysqli("localhost", "root", "", "shard_database");

// Ambil data JSON yang dikirim
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Simpan data ke database shard
$stmt = $mysqli->prepare("INSERT INTO artikel (id, judul, kategori, konten) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss", $data['id'], $data['judul'], $data['kategori'], $data['konten']);
$stmt->execute();
$stmt->close();

echo "Data berhasil diterima!";
?>
