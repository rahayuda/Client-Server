<?php include 'analytics.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Detail</title>
</head>
<body>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="detail.php">Detail</a></li>
    </ul>
</body>
</html>

<?php
function displayUsabilityData($logFile) {
    if (file_exists($logFile)) {
        $logData = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        if ($logData) {
            echo "<table border='1'>";
            echo "<tr>
                    <th>User ID</th>
                    <th>Page</th>
                    <th>Referer</th>
                    <th>Timestamp</th>
                    <th>Date and Time</th>
                    <th>Event</th>
                    <th>Duration (s)</th>
                    <th>Device</th>
                    <th>Browser</th>
                    <th>Ip</th>
                    <th>Country</th>
                    <th>Region</th>
                    <th>City</th>
                  </tr>";
            
            foreach ($logData as $entry) {
                list($user_id, $page, $referer, $timestamp, $event, $duration, $device, $browser, $query, $country, $region, $city) = explode(',', $entry);
                $datetime = date("Y-m-d H:i:s", $timestamp);
                echo "<tr>
                        <td>{$user_id}</td>
                        <td>{$page}</td>
                        <td>{$referer}</td>
                        <td>{$timestamp}</td>
                        <td>{$datetime}</td>
                        <td>{$event}</td>
                        <td>{$duration}</td>
                        <td>{$device}</td>
                        <td>{$browser}</td>
                        <td>{$query}</td>
                        <td>{$country}</td>
                        <td>{$region}</td>
                        <td>{$city}</td>
                      </tr>";
            }
            
            echo "</table>";
        } else {
            echo "Log file is empty.";
        }
    } else {
        echo "Log file does not exist.";
    }
}

// Panggil fungsi untuk menampilkan data usability
displayUsabilityData('usability_analytics.log');
?>