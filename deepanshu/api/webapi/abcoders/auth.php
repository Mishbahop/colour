<?php
require_once "devil.php";

function handleAuthRequest($req) {
    $token = $req['token'] ?? null;

    if (!$token) {
        return json_encode([
            'errorCode' => 4,
            'message' => "Token is required"
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

            return json_encode([
                'errorCode' => 0,
                'message' => "Success",
                'currency' => "INR",
                'username' => $username,
                'balance' => $balance,
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
            'message' => "Error while fetching from database!"
        ]);
    } finally {
        $conn->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    echo handleAuthRequest($data);
} else {
    echo json_encode([
        'errorCode' => 4,
        'message' => "Invalid request method"
    ]);
}
?>
