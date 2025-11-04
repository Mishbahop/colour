<?php
include("serive/samparka.php");
$app->get('/getUserBalance', function($request, $response) use ($pool) {
    $phone = $request->getQueryParams()['userId'] ?? null;

    if (!$phone) {
        return $response->withJson(['error' => 'Missing userid'], 400);
    }

    $query = 'SELECT money FROM users WHERE phone = ?';
    $stmt = $pool->prepare($query);

    if (!$stmt) {
        return $response->withJson(['error' => 'Failed to prepare statement'], 500);
    }

    if (!$stmt->execute([$phone])) {
        return $response->withJson(['error' => 'Failed to fetch balance'], 500);
    }

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        return $response->withJson(['error' => 'User not found'], 404);
    }

    return $response->withJson(['balance' => $result['money']]);
});
