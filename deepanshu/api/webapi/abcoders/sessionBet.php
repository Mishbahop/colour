<?php
require_once "devil.php";

function handleSessionBetRequest($req) {
    $reqId = $req['reqId'] ?? null;
    $token = $req['token'] ?? null;
    $currency = $req['currency'] ?? null;
    $game = $req['game'] ?? null;
    $round = $req['round'] ?? null;
    $sessionId = $req['sessionId'] ?? null;
    $type = $req['type'] ?? null; 
    $wagersTime = $req['wagersTime'] ?? null;
    $betAmount = $req['betAmount'] ?? 0;
    $winloseAmount = $req['winloseAmount'] ?? 0;
    $preserve = $req['preserve'] ?? 0;
    $turnover = $req['turnover'] ?? 0;
    $userId = $req['userId'] ?? null;
    $platform = $req['platform'] ?? null;
    $sessionTotalBet = $req['sessionTotalBet'] ?? null;
    $statementType = $req['statementType'] ?? null;
    $gameCategory = $req['gameCategory'] ?? null;

    if (!$token || !$currency || !$game || !$round || !$sessionId || !$wagersTime || !$type) {
        return json_encode([
            'errorCode' => 3,
            'message' => "Missing required parameters"
        ]);
    }

    if ($betAmount < 0 || $winloseAmount < 0) {
        return json_encode([
            'errorCode' => 4,
            'message' => "Invalid bet or win/lose amount"
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
            $balance = $user['motta'];

            if ($type == 1) { 
                $finalAmount = $balance - $preserve - $betAmount;
            } elseif ($type == 2) { 
                $finalAmount = $balance + $preserve - $betAmount + $winloseAmount;
            }

            $updateStmt = $conn->prepare("UPDATE shonu_kaichila SET motta = ? WHERE balakedara = ?");
            $updateStmt->bind_param("ds", $finalAmount, $token);
            $updateStmt->execute();


            return json_encode([
                'errorCode' => 0,
                'message' => "Success",
                'username' => $username,
                'currency' => $currency,
                'balance' => $finalAmount,
                'txId' => $round, 
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
            'errorCode' => 5,
            'message' => "Error while processing the session bet"
        ]);
    } finally {
      
        $conn->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    echo handleSessionBetRequest($data);
} else {

    echo json_encode([
        'errorCode' => 4,
        'message' => "Invalid request method"
    ]);
}
?>
