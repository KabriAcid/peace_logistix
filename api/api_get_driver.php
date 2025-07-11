<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/util.php';

header('Content-Type: application/json');

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid driver ID.']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT * FROM drivers WHERE id = ? LIMIT 1");
    $stmt->execute([$id]);
    $driver = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($driver) {
        echo json_encode(['status' => 'success', 'data' => $driver]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Driver not found.']);
    }
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch driver.']);
}
