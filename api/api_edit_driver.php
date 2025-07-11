<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/util.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

$id = intval($_POST['driver_id'] ?? 0);
$driver_name = trim($_POST['driver_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$license_number = trim($_POST['license_number'] ?? '');
$status = trim($_POST['status'] ?? '');

if ($id <= 0 || $driver_name === '' || $phone === '' || $license_number === '' || $status === '') {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE drivers SET driver_name = ?, phone = ?, license_number = ?, status = ? WHERE id = ?");
    $stmt->execute([$driver_name, $phone, $license_number, $status, $id]);

    echo json_encode(['status' => 'success', 'message' => 'Driver updated successfully.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update driver.']);
}
