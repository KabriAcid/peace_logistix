<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../helpers/util.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}

$driver_name = trim($_POST['driver_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$license_number = trim($_POST['license_number'] ?? '');
$status = trim($_POST['status'] ?? '');

if ($driver_name === '' || $phone === '' || $license_number === '' || $status === '') {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO drivers (driver_name, phone, license_number, status) VALUES (?, ?, ?, ?)");
    $stmt->execute([$driver_name, $phone, $license_number, $status]);

    echo json_encode(['status' => 'success', 'message' => 'Driver added successfully.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add driver.']);
}
