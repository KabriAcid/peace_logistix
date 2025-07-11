<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/auth.php';

header('Content-Type: application/json');

$id = intval($_GET['id'] ?? 0);

$stmt = $pdo->prepare("SELECT * FROM vehicles WHERE id = ?");
$stmt->execute([$id]);
$truck = $stmt->fetch(PDO::FETCH_ASSOC);

if ($truck) {
    echo json_encode(['status' => 'success', 'data' => $truck]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Truck not found.']);
}
