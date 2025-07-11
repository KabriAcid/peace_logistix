<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/util.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

$truck_id = intval($_POST['truck_id'] ?? 0);
$driver_id = intval($_POST['driver_id'] ?? 0);
$destination = trim($_POST['destination'] ?? '');
$goods_value = trim($_POST['goods_value'] ?? '');
$remarks = trim($_POST['remarks'] ?? '');

if ($truck_id <= 0 || $driver_id <= 0 || $destination === '' || $goods_value === '') {
    echo json_encode(['status' => 'error', 'message' => 'All required fields must be filled.']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO reports (truck_id, driver_id, destination, goods_value, remarks) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$truck_id, $driver_id, $destination, $goods_value, $remarks]);

    echo json_encode(['status' => 'success', 'message' => 'Report added successfully.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add report.']);
}
