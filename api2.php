<?php
// Define the API URL
$apiUrl = "https://services.tokenview.io/vipapi/block/latest/trx?apikey=rkJTsUEMznEzqXb3kDR9";

// Fetch the API response
$response = file_get_contents($apiUrl);

// Decode the JSON response into an associative array
$data = json_decode($response, true);

// Check if the response is valid and contains data
if ($data && $data['code'] == 1) {
    // Extract block details from the response
    $blockData = $data['data'][0];
    $blockNumber = $blockData['block_no'];
    $time = $blockData['time'];
    $txCount = $blockData['txCnt'];
    $sentValue = $blockData['sentValue'];
    $reward = $blockData['reward'];
    $miner = $blockData['miner'];
    
    // Print the block information
    echo "Block Number: $blockNumber\n";
    echo "Time: $time\n";
    echo "Transaction Count: $txCount\n";
    echo "Sent Value: $sentValue\n";
    echo "Reward: $reward\n";
    echo "Miner: $miner\n";
} else {
    echo "Error fetching or decoding the data from the API.\n";
}
?>
