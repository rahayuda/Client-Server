<?php
// String for Levenshtein distance calculation
$string1 = "kucing";
$string2 = "makanan";

// Calculate Levenshtein distance between two strings using levenshtein()
$levenshtein_distance = levenshtein($string1, $string2);
echo "Levenshtein distance between '$string1' and '$string2' is $levenshtein_distance<br>";

// Hashing string using hash() algorithm (MD5)
$hashed_string = hash('md5', $string1);
echo "Hash value of '$string1' using MD5 algorithm is $hashed_string<br>";

// Example data for JSON encoding and decoding
$data = array(
    'name' => 'John Doe',
    'age' => 30,
    'city' => 'Jakarta'
);

// Encode data into JSON format using json_encode()
$json_data = json_encode($data);
echo "Data in JSON format: $json_data<br>";

// Decode JSON data using json_decode()
$decoded_data = json_decode($json_data, true);
echo "Decoded data: <br>";
print_r($decoded_data);

// Base64 encoding and decoding example
$string_to_encode = "Hello, world!";
$encoded_string = base64_encode($string_to_encode);
echo "<br>Base64 encoded string: $encoded_string<br>";
$decoded_string = base64_decode($encoded_string);
echo "Base64 decoded string: $decoded_string<br>";

// Regular expression pattern matching example
$pattern = "/world/i";
$string_to_match = "Hello, World!";
if (preg_match($pattern, $string_to_match)) {
    echo "<br>Pattern '$pattern' found in '$string_to_match'<br>";
} else {
    echo "<br>Pattern '$pattern' not found in '$string_to_match'<br>";
}

// Date and time manipulation example
$current_date = date('Y-m-d H:i:s');
echo "<br>Current date and time: $current_date<br>";
$timestamp = strtotime('next Sunday');
$future_date = date('Y-m-d', $timestamp);
echo "Next Sunday's date: $future_date<br>";

// String comparison example
$string1 = "apple";
$string2 = "banana";
$similarity_percentage = similar_text($string1, $string2);
echo "<br>Similarity percentage between '$string1' and '$string2' is $similarity_percentage%<br>";

// Soundex comparison example
$soundex1 = soundex($string1);
$soundex2 = soundex($string2);
if ($soundex1 === $soundex2) {
    echo "Soundex values for '$string1' and '$string2' are the same<br>";
} else {
    echo "Soundex values for '$string1' and '$string2' are different<br>";
}

// HMAC (Hash-based Message Authentication Code) example
$data_hmac = "Hello, HMAC!";
$key_hmac = "secret_key";
$hmac = hash_hmac('sha256', $data_hmac, $key_hmac);
echo "<br>HMAC using SHA256 algorithm: $hmac<br>";
echo "<br>";

// AES (Advanced Encryption Standard) example (encryption and decryption)
$data_aes = "Hello, AES!";
$key_aes = "secret_key_aes";
$iv_aes = random_bytes(16);
$encrypted_data_aes = openssl_encrypt($data_aes, 'aes-256-cbc', $key_aes, 0, $iv_aes);
echo "Encrypted data using AES: $encrypted_data_aes<br>";
$decrypted_data_aes = openssl_decrypt($encrypted_data_aes, 'aes-256-cbc', $key_aes, 0, $iv_aes);
echo "Decrypted data using AES: $decrypted_data_aes<br>";
echo "<br>";

// Blowfish encryption and decryption example
$data_blowfish = "Hello, Blowfish!";
$key_blowfish = "secret_key_blowfish";
$encrypted_data_blowfish = crypt($data_blowfish, $key_blowfish);
echo "Encrypted data using Blowfish: $encrypted_data_blowfish<br>";
$decrypted_data_blowfish = crypt($encrypted_data_blowfish, $key_blowfish);
echo "Decrypted data using Blowfish: $decrypted_data_blowfish<br>";
echo "<br>";

// Chacha20 encryption and decryption example
if (extension_loaded('sodium')) {
    $data_chacha20 = "Hello, Chacha20!";
    $key_chacha20 = random_bytes(SODIUM_CRYPTO_STREAM_KEYBYTES);
    $nonce_chacha20 = random_bytes(SODIUM_CRYPTO_STREAM_NONCEBYTES);
    $encrypted_data_chacha20 = sodium_crypto_stream_xor($data_chacha20, $nonce_chacha20, $key_chacha20);
    echo "Encrypted data using Chacha20: " . bin2hex($encrypted_data_chacha20) . "<br>";
    $decrypted_data_chacha20 = sodium_crypto_stream_xor($encrypted_data_chacha20, $nonce_chacha20, $key_chacha20);
    echo "Decrypted data using Chacha20: " . $decrypted_data_chacha20 . "<br>";
} else {
    echo "Sodium extension is not loaded. Chacha20 encryption cannot be performed.<br>";
}
echo "<br>";

// Triple DES (Data Encryption Standard) encryption and decryption example
$data_3des = "Hello, Triple DES!";
$key_3des = "secret_key_3des";
$encrypted_data_3des = openssl_encrypt($data_3des, 'des-ede3', $key_3des, OPENSSL_RAW_DATA);
echo "Encrypted data using Triple DES: " . base64_encode($encrypted_data_3des) . "<br>";
$decrypted_data_3des = openssl_decrypt($encrypted_data_3des, 'des-ede3', $key_3des, OPENSSL_RAW_DATA);
echo "Decrypted data using Triple DES: $decrypted_data_3des<br>";

// RC4 encryption and decryption example
$data_rc4 = "Hello, RC4!";
$key_rc4 = "secret_key_rc4";

// Encrypt using RC4
$encrypted_data_rc4 = openssl_encrypt($data_rc4, 'RC4', $key_rc4, OPENSSL_RAW_DATA);
if ($encrypted_data_rc4 === false) {
    die("Encryption failed: " . openssl_error_string());
}
echo "Encrypted data using RC4: " . base64_encode($encrypted_data_rc4) . "<br>";

?>