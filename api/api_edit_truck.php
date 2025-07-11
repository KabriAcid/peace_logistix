<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/auth.php';

header('Content-Type: application/json');

$id = intval($_POST['truck_id'] ?? 0);
$vehicle_name = trim($_POST['vehicle_name'] ?? '');
$license_plate = trim($_POST['license_plate'] ?? '');
$status = trim($_POST['status'] ?? '');

if ($id && $vehicle_name && $license_plate && $status) {
    $stmt = $pdo->prepare("UPDATE vehicles SET vehicle_name = ?, license_plate = ?, status = ? WHERE id = ?");
    $stmt->execute([$vehicle_name, $license_plate, $status, $id]);

    echo json_encode(['status' => 'success', 'message' => 'Truck updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
}
