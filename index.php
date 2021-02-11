<?php

// Set API access key 
$queryString = http_build_query(&#91; 
  'access_key' => '08d9a9c3b45bf0be7f7627fbc557f953', 
  'symbols' => 'AAPL' 
]); 
 
// API URL with query string 
$apiURL = sprintf('%s?%s', 'https://api.marketstack.com/v1/eod', $queryString); 
 
// Initialize cURL 
$ch = curl_init(); 
 
// Set URL and other appropriate options 
curl_setopt($ch, CURLOPT_URL, $apiURL); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
 
// Execute and get response from API 
$api_response = curl_exec($ch); 

// Convert API json response to array 
$api_result = json_decode($api_response, true); 
 
echo $api_result;

// Output of the API data 
foreach ($api_result&#91;'data'] as $data) { 
    // Execution code goes here... 
}
// Close cURL 
curl_close($ch);

?>
