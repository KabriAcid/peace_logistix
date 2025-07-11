<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../helpers/util.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vehicle_name = trim($_POST['vehicle_name'] ?? '');
    $license_plate = trim($_POST['license_plate'] ?? '');
    $status = trim($_POST['status'] ?? '');

    if (empty($vehicle_name) || empty($license_plate) || empty($status)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO truck (truck_name, license_plate, status) VALUES (?, ?, ?)");
        $stmt->execute([$vehicle_name, $license_plate, $status]);

        echo json_encode(['status' => 'success', 'message' => 'Truck added successfully.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to save truck.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
