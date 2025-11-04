<?php
$host = 'localhost';
$dbname = 'numbergu_Freegame';
$user = 'numbergu_Freegame';
$pass = 'numbergu_Freegame';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log('Database connection failed: ' . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode([
        'status' => '0002',
        'balance' => 0,
        'err_text' => 'Database error'
    ]);
    exit;
}

function logData($data, $type) {
    $logFile = __DIR__ . "/logs/{$type}.log";
    $logEntry = date('Y-m-d H:i:s') . ' ' . json_encode($data, JSON_PRETTY_PRINT) . "\n";
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

if (!is_dir(__DIR__ . '/logs')) {
    mkdir(__DIR__ . '/logs', 0755, true);
}

$request = file_get_contents('php://input');

logData(['request' => $request], 'requests');

$requestData = json_decode($request, true);

logData(['decodedRequest' => $requestData], 'decoded_requests');

if (json_last_error() !== JSON_ERROR_NONE) {
    $response = [
        'status' => '0002',
        'balance' => 0,
        'err_text' => 'Invalid JSON format'
    ];
    logData(['error' => json_last_error_msg(), 'request' => $request], 'errors');
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

$response = [];

switch ($requestData['action'] ?? null) {
    case 6:
        logData(['action' => $requestData['action'], 'parameters' => $requestData], 'action_logs');

        $phone = $requestData['uid'] ?? '';

        if (empty($phone) || !ctype_alnum($phone) || strlen($phone) > 30) {
            $response = [
                'status' => '0001',
                'balance' => 0,
                'err_text' => 'Invalid UID'
            ];
        } else {
            try {
                $stmt = $pdo->prepare("SELECT id FROM shonu_subjects WHERE mobile = :phone");
                $stmt->execute(['phone' => $phone]);
                $row_subject = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row_subject) {
                    $user_id = $row_subject['id'];
                    $stmt_balance = $pdo->prepare("SELECT motta AS balance FROM shonu_kaichila WHERE balakedara = :user_id");
                    $stmt_balance->execute(['user_id' => $user_id]);
                    $row_balance = $stmt_balance->fetch(PDO::FETCH_ASSOC);

                    if ($row_balance) {
                        $response = [
                            'status' => '0000',
                            'balance' => $row_balance['balance'],
                            'err_text' => ''
                        ];
                    } else {
                        $response = [
                            'status' => '0001',
                            'balance' => 0,
                            'err_text' => 'User data not found in shonu_kaichila'
                        ];
                    }
                } else {
                    $response = [
                        'status' => '0001',
                        'balance' => 0,
                        'err_text' => 'User not found in shonu_subjects'
                    ];
                }
            } catch (PDOException $e) {
                error_log('Database query failed: ' . $e->getMessage());
                $response = [
                    'status' => '0002',
                    'balance' => 0,
                    'err_text' => 'Database error'
                ];
            }
        }
        break;

    // Repeat similar changes in other cases as per required actions
    default:
        $response = [
            'status' => '0003',
            'balance' => 0,
            'err_text' => 'Invalid action'
        ];
        break;
}

logData(['response' => $response], 'responses');

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>
