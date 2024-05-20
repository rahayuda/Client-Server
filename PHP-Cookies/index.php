<?php include 'analytics.php'; ?>

<?php
// Fungsi untuk memuat data dari file log
function loadAnalyticsData($logFile) {
	$analyticsData = array(
		'pages' => array(),
		'devices' => array(),
		'countries' => array(),
		'user_ids' => array()
	);

	if (file_exists($logFile)) {
		$logData = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

		foreach ($logData as $entry) {
			list($user_id, $page, $referer, $timestamp, $event, $duration, $device, $browser, $query, $country, $region, $city) = explode(',', $entry);

            // Statistik berdasarkan halaman
			if (!isset($analyticsData['pages'][$page])) {
				$analyticsData['pages'][$page] = array(
					'total_visitors' => 0,
					'total_duration' => 0
				);
			}
			$analyticsData['pages'][$page]['total_visitors']++;
			$analyticsData['pages'][$page]['total_duration'] += $duration;

            // Statistik berdasarkan perangkat
			if (!isset($analyticsData['devices'][$device])) {
				$analyticsData['devices'][$device] = 0;
			}
			$analyticsData['devices'][$device]++;

            // Statistik berdasarkan ip
			if (!isset($analyticsData['query'][$query])) {
				$analyticsData['query'][$query] = 0;
			}
			$analyticsData['query'][$query]++;

            // Statistik berdasarkan negara
			if (!isset($analyticsData['countries'][$country])) {
				$analyticsData['countries'][$country] = 0;
			}
			$analyticsData['countries'][$country]++;

            // Statistik berdasarkan region
			if (!isset($analyticsData['region'][$region])) {
				$analyticsData['region'][$region] = 0;
			}
			$analyticsData['region'][$region]++;

            // Statistik berdasarkan city
			if (!isset($analyticsData['city'][$city])) {
				$analyticsData['city'][$city] = 0;
			}
			$analyticsData['city'][$city]++;

            // Statistik berdasarkan user id
			if (!isset($analyticsData['user_ids'][$user_id])) {
				$analyticsData['user_ids'][$user_id] = 0;
			}
			$analyticsData['user_ids'][$user_id]++;
		}
	}

	return $analyticsData;
}

$logFile = 'usability_analytics.log';
$analyticsData = loadAnalyticsData($logFile);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
</head>
<body>
	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="detail.php">Detail</a></li>
	</ul>

	<table border="1">
		<tr>
			<th>Page</th>
			<th>Visitor</th>
			<th>Duration (sec)</th>
		</tr>
		<?php foreach ($analyticsData['pages'] as $page => $stats): ?>
			<tr>
				<td><?php echo $page; ?></td>
				<td><?php echo $stats['total_visitors']; ?></td>
				<td><?php echo $stats['total_duration']; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<hr>
	<table border="1">
		<tr>
			<th>Device</th>
			<th>Visitor</th>
		</tr>
		<?php foreach ($analyticsData['devices'] as $device => $totalVisitors): ?>
			<tr>
				<td><?php echo $device; ?></td>
				<td><?php echo $totalVisitors; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<hr>
	<table border="1">
		<tr>
			<th>Ip Address</th>
			<th>View</th>
		</tr>
		<?php foreach ($analyticsData['query'] as $query => $totalVisitors): ?>
			<tr>
				<td><?php echo $query; ?></td>
				<td><?php echo $totalVisitors; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<hr>
	<table border="1">
		<tr>
			<th>Country</th>
			<th>Visitor</th>
		</tr>
		<?php foreach ($analyticsData['countries'] as $country => $totalVisitors): ?>
			<tr>
				<td><?php echo $country; ?></td>
				<td><?php echo $totalVisitors; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<hr>
	<table border="1">
		<tr>
			<th>Region</th>
			<th>Visitor</th>
		</tr>
		<?php foreach ($analyticsData['region'] as $region => $totalVisitors): ?>
			<tr>
				<td><?php echo $region; ?></td>
				<td><?php echo $totalVisitors; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<hr>
	<table border="1">
		<tr>
			<th>City</th>
			<th>Visitor</th>
		</tr>
		<?php foreach ($analyticsData['city'] as $city => $totalVisitors): ?>
			<tr>
				<td><?php echo $city; ?></td>
				<td><?php echo $totalVisitors; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<hr>
	<table border="1">
		<tr>
			<th>User ID</th>
			<th>Visitor</th>
		</tr>
		<?php foreach ($analyticsData['user_ids'] as $user_id => $totalVisitors): ?>
			<tr>
				<td><?php echo $user_id; ?></td>
				<td><?php echo $totalVisitors; ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>