<?php
// Log the start time of the cron
echo "Cron started at: " . date('Y-m-d H:i:s') . PHP_EOL;

// Define tasks and their execution intervals
$tasks = [
    [
        'url' => 'https://numberguest.shop/niyamitakelasa_aidudi.php',
        'interval' => '* * * * *', // Every minute
    ],
    [
        'url' => 'https://numberguest.shop/niyamitakelasa_aidudi_funf.php',
        'interval' => '*/5 * * * *', // Every 5 minutes
    ],
    [
        'url' => 'https://numberguest.shop/niyamitakelasa_funf.php',
        'interval' => '*/5 * * * *', // Every 5 minutes
    ],
    [
        'url' => 'https://numberguest.shop/niyamitakelasa_kemuru_drei.php',
        'interval' => '*/3 * * * *', // Every 3 minutes
    ],
    [
        'url' => 'https://numberguest.shop/niyamitakelasa_kemuru_funf.php',
        'interval' => '*/5 * * * *', // Every 5 minutes
    ],
    [
        'url' => 'https://numberguest.shop/niyamitakelasa_kemuru_zehn.php',
        'interval' => '* * * * *', // Every 10 minutes
    ], 
    [
        'url' => 'https://numberguest.shop/niyamitakelasa_aidudi_drei.php',
        'interval' => '*/3 * * * *', // Every 3 minutes
    ],
    [
        'url' => 'https://numberguest.shop/niyamitakelasa.php',
        'interval' => '* * * * *', // Every minute
    ],
    [
        'url' => 'https://numberguest.shop/niyamitakelasa_kemuru.php',
        'interval' => '*/5 * * * *', // Every 5 minutes
    ],
    [
        'url' => 'https://numberguest.shop/niyamitakelasa_drei.php',
        'interval' => '*/3 * * * *', // Every 3 minutes
    ],
];

// Execute each task
foreach ($tasks as $task) {
    $output = file_get_contents($task['url']); // Execute the URL
    echo "Executed: {$task['url']} | Response: {$output}" . PHP_EOL;
}

// Log the end time
echo "Cron finished at: " . date('Y-m-d H:i:s') . PHP_EOL;
?>
