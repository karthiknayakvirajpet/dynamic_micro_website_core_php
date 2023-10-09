<?php
$apiUrl = $_GET['api_url'] ?? '';

// Initialize cURL
$curl = curl_init();

//cURL options
curl_setopt($curl, CURLOPT_URL, $apiUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_TIMEOUT, 30);

// Execute cURL
$response = curl_exec($curl);

// Check for cURL errors
if (curl_errno($curl)) {
    echo 'cURL error: ' . curl_error($curl);
} else {
    //API response
    header('Content-Type: application/json');
    echo $response;
}

//Close cURL
curl_close($curl);
?>