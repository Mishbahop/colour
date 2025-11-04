<?php
require_once "devil.php";

function handleCancelBetRequest($req) {
    $reqId = $req['reqId'] ?? null;
    $token = $req['token'] ?? null;
    $betAmount = $req['betAmount'] ?? 0;

    if (!$token) {
        return json_encode([
            'errorCode' => 4,
            'message' => "Token is required"
        ]);
    }

    if ($betAmount <= 0) {
        return json_encode([
            'errorCode' => 4,
            'message' => "Invalid bet amount"
        ]);
    }

    $conn = getDBConnection();

    try {
        $stmt = $conn->prepare("SELECT balakedara, motta FROM shonu_kaichila WHERE balakedara = ? LIMIT 1");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            $username = strval($user['balakedara']);
            $currentBalance = $user['motta'];

            $finalAmount = $currentBalance + $betAmount;

            $updateStmt = $conn->prepare("UPDATE shonu_kaichila SET motta = ? WHERE balakedara = ?");
            $updateStmt->bind_param("ds", $finalAmount, $token);
            $updateStmt->execute();

            return json_encode([
                'errorCode' => 0,
                'message' => "Bet canceled successfully",
                'username' => $username,
                'currency' => "INR",
                'balance' => $finalAmount,
                'token' => $token
            ]);
        } else {
            return json_encode([
                'errorCode' => 1,
                'message' => "Invalid token"
            ]);
        }

    } catch (Exception $error) {
        error_log($error);
        return json_encode([
            'errorCode' => 4,
            'message' => "Error while canceling the bet"
        ]);
    } finally {
        $conn->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    echo handleCancelBetRequest($data);
} else {
    echo json_encode([
        'errorCode' => 4,
        'message' => "Invalid request method"
    ]);
}
?>
