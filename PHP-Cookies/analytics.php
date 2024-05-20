<?php
session_start();

// Set cookie untuk pengguna unik jika belum ada
if (!isset($_COOKIE['user_id'])) {
    $user_id = uniqid();
    setcookie('user_id', $user_id, time() + (86400 * 365), "/"); // Cookie berlaku selama 1 tahun
    $_COOKIE['user_id'] = $user_id; // Untuk penggunaan saat ini
} else {
    $user_id = $_COOKIE['user_id'];
}

// Menghitung durasi kunjungan
if (!isset($_SESSION['visit_start'])) {
    $_SESSION['visit_start'] = time();
}
$visit_start = $_SESSION['visit_start'];
$visit_end = time();
$duration = $visit_end - $visit_start; // Durasi dalam detik
$_SESSION['visit_start'] = $visit_end; // Memperbarui waktu kunjungan untuk halaman berikutnya

// Mendapatkan informasi browser dan perangkat
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$device = 'Desktop';
if (preg_match('/mobile/i', $user_agent)) {
    $device = 'Mobile';
}
$browser = 'Unknown';
if (preg_match('/MSIE/i', $user_agent) || preg_match('/Trident/i', $user_agent)) {
    $browser = 'Internet Explorer';
} elseif (preg_match('/Firefox/i', $user_agent)) {
    $browser = 'Firefox';
} elseif (preg_match('/Chrome/i', $user_agent)) {
    $browser = 'Chrome';
} elseif (preg_match('/Safari/i', $user_agent)) {
    $browser = 'Safari';
} elseif (preg_match('/Opera/i', $user_agent) || preg_match('/OPR/i', $user_agent)) {
    $browser = 'Opera';
}

// Mendapatkan informasi negara dan daerah berdasarkan alamat IP pengguna dari ip-api.com
$user_ip = $_SERVER['REMOTE_ADDR'];
$api_url = "http://ip-api.com/json";
$response = file_get_contents($api_url);
$geo_data = json_decode($response);
$country = $geo_data->country ?? 'Unknown';
$region = $geo_data->regionName ?? 'Unknown';
$city = $geo_data->city ?? 'Unknown';
$query = $geo_data->query ?? 'Unknown';

// Informasi halaman yang dikunjungi
$page = $_SERVER['REQUEST_URI'];
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Direct';
$timestamp = time();
$event = isset($_GET['event']) ? $_GET['event'] : 'visit';

// Simpan data ke dalam file log
$log_entry = "$user_id, $page, $referer, $timestamp, $event, $duration, $device, $browser, $query, $country, $region, $city\n";
file_put_contents('usability_analytics.log', $log_entry, FILE_APPEND);
?>