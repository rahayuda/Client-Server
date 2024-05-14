<h2><b>Request</b></h2>
<hr>

<?php

$profile_json = file_get_contents("https://raw.githubusercontent.com/rahayuda/cURL/main/mahasiswa.json");
$profile = json_decode($profile_json, TRUE);

echo "<pre>";
//print_r($profile);
echo json_encode($profile, JSON_PRETTY_PRINT);
echo "</pre>";

?>